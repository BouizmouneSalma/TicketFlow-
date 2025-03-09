@extends('components.layout')
@section('title', 'GeoQuestions Maroc - Espace Développeur')
@section('content')
<div class="container mx-auto px-4 py-6 flex-grow">
    @if(session('success'))
    <div class="flex items-center justify-between bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-md mb-4 animate-fadeIn">
        <div class="flex items-center">
            <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="text-green-600 hover:text-green-800 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    @endif

    <div class="bg-white rounded-lg shadow-md p-6 mb-6 border-l-4 border-blue-500">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Espace Développeur</h2>
                <p class="text-gray-600 mt-1">Gestion de vos tickets assignés</p>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                    {{ Auth::user()->name }}
                </span>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4 border-b-4 border-blue-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500">Tickets assignés</p>
                    <h3 class="text-2xl font-bold">{{$allTickets}}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-ticket-alt text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-b-4 border-orange-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500">En cours</p>
                    <h3 class="text-2xl font-bold">{{$ticketEncours}}</h3>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <i class="fas fa-spinner text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-b-4 border-green-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500">Résolus</p>
                    <h3 class="text-2xl font-bold">{{$ticketResolu}}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-b-4 border-gray-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500">Fermés</p>
                    <h3 class="text-2xl font-bold">{{$ticketFerme}}</h3>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="fas fa-lock text-gray-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tickets Table -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-700">Vos tickets assignés</h3>
            <div class="flex space-x-2">
                <button onclick="window.location.href='{{ url('/developer') }}'" 
                        class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm font-medium hover:bg-blue-200 transition">
                    Tous ({{$allTickets}})
                </button>
                <button onclick="window.location.href='{{ url('/developer?filter=encours') }}'"
                        class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-sm font-medium hover:bg-gray-200 transition">
                    En Cours ({{$ticketEncours}})
                </button>
                <button onclick="window.location.href='{{ url('/developer?filter=resolved') }}'"
                        class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-sm font-medium hover:bg-gray-200 transition">
                    Résolus ({{$ticketResolu}})
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left text-gray-600 text-sm">
                        <th class="px-6 py-3 font-medium">Ticket</th>
                        <th class="px-6 py-3 font-medium">Priorité</th>
                        <th class="px-6 py-3 font-medium">Statut</th>
                        <th class="px-6 py-3 font-medium">Date d'assignation</th>
                        <th class="px-6 py-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assignedTickets as $ticket)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div>
                                <p class="font-medium">{{$ticket->title}}</p>
                                <p class="text-sm text-gray-500">{{$ticket->system}}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 
                                {{ $ticket->priority == 'Haute' ? 'bg-red-100 text-red-800' : '' }}
                                {{ $ticket->priority == 'Moyenne' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $ticket->priority == 'Basse' ? 'bg-green-100 text-green-800' : '' }} 
                                rounded-full text-xs">
                                {{$ticket->priority}}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 
                                {{ $ticket->status == 'En cours' ? 'bg-orange-100 text-orange-800' : '' }}
                                {{ $ticket->status == 'Résolu' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $ticket->status == 'Fermé' ? 'bg-gray-100 text-gray-800' : '' }}
                                rounded-full text-xs">
                                {{$ticket->status}}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$ticket->assigned_at}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button onclick="viewTicketDetails({{$ticket->id}})" 
                                        class="p-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="updateStatus({{$ticket->id}})" 
                                        class="p-1 bg-green-100 text-green-600 rounded hover:bg-green-200">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div id="statusModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Mettre à jour le statut</h2>
        <form method="POST" action="{{ route('developer.updateStatus') }}">
            @csrf
            <input type="hidden" id="updateTicketId" name="ticket_id">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nouveau statut:</label>
                <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="En cours">En cours</option>
                    <option value="Résolu">Résolu</option>
                    <option value="Fermé">Fermé</option>
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeStatusModal()" 
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                    Annuler
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function updateStatus(ticketId) {
    document.getElementById('updateTicketId').value = ticketId;
    document.getElementById('statusModal').classList.remove('hidden');
}

function closeStatusModal() {
    document.getElementById('statusModal').classList.add('hidden');
}

function viewTicketDetails(ticketId) {
    window.location.href = `/tickets/${ticketId}`;
}
</script>
@endsection