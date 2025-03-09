@extends('components.layout')
@section('title', 'GeoQuestions Maroc - Plateforme Communautaire')
@section('content')
  <div class="container mx-auto px-4 py-6 flex-grow">
    {{-- <div class="flex items-center justify-between bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-md mb-4 animate-fadeIn">
        <div class="flex items-center">
            <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="text-sm font-medium">Le ticket a été assigné avec succès.</span>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="text-green-600 hover:text-green-800 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div> --}}

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out;
        }
    </style>

    <!-- Admin Welcome Header -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6 border-l-4 border-purple-500">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
        <div>
          <h2 class="text-2xl font-bold text-gray-800">Panneau d'administration</h2>
          <p class="text-gray-600 mt-1">Gestion des tickets et assignation aux développeurs</p>
        </div>
        <div class="flex space-x-2 mt-4 md:mt-0">
          <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md transition flex items-center">
            <i class="fas fa-cog mr-2"></i> Paramètres
          </button>
          <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition flex items-center">
            <i class="fas fa-plus mr-2"></i> Nouveau technicien
          </button>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
      <div class="bg-white rounded-lg shadow p-4 border-b-4 border-blue-500">
        <div class="flex justify-between items-center">
          <div>
            <p class="text-gray-500">Tickets totaux</p>
            <h3 class="text-2xl font-bold">({{$allTickets}})</h3>
          </div>
          <div class="bg-blue-100 p-3 rounded-full">
            <i class="fas fa-ticket-alt text-blue-600 text-xl"></i>
          </div>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow p-4 border-b-4 border-yellow-500">
        <div class="flex justify-between items-center">
          <div>
            <p class="text-gray-500">Non assignés</p>
            <h3 class="text-2xl font-bold">({{$unassignedTickets}})</h3>
          </div>
          <div class="bg-yellow-100 p-3 rounded-full">
            <i class="fas fa-user-clock text-yellow-600 text-xl"></i>
          </div>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow p-4 border-b-4 border-orange-500">
        <div class="flex justify-between items-center">
          <div>
            <p class="text-gray-500">En cours</p>
            <h3 class="text-2xl font-bold">({{$ticketEncour}})</h3>
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
            <h3 class="text-2xl font-bold">({{$ticketResolu}})</h3>
          </div>
          <div class="bg-green-100 p-3 rounded-full">
            <i class="fas fa-check-circle text-green-600 text-xl"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
      <div class="lg:col-span-3">
        <div class="bg-white rounded-lg shadow">
          <div class="px-6 py-4 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-700">Vos tickets</h3>
            <div class="flex space-x-2">
                <a href="{{ url('/admin') }}">
                <button class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm font-medium hover:bg-blue-200 transition">
                        Tous ({{$allTickets}})
                </button>
                </a>
                <a href="{{ url('/admin?filter=encours') }}">
              <button class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-sm font-medium hover:bg-gray-200 transition">
                En Cours ({{$ticketEncour}})
              </button>
              </a>
              <a href="{{ url('/admin?filter=resolved') }}">
              <button class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-sm font-medium hover:bg-gray-200 transition">
                Résolus ({{$ticketResolu}})
              </button>
              </a>
              <a href="{{ url('/admin?filter=ferme') }}">
                <button class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-sm font-medium hover:bg-gray-200 transition">
                    Fermé ({{$ticketFerme}})
                </button>
                </a>
            </div>
          </div>
          
          <div class="px-6 py-4 border-b bg-gray-50">
            <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-3">
              <div class="relative flex-grow">
                <input type="text" placeholder="Rechercher un ticket..." class="pl-10 pr-4 py-2 rounded-md border w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
              </div>
              <select class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option>Tous les logiciels</option>
                <option>SQL Server</option>
                <option>Export Tool</option>
                <option>CRM</option>
              </select>
              <select class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option>Toutes priorités</option>
                <option>Haute</option>
                <option>Moyenne</option>
                <option>Basse</option>
              </select>
            </div>
          </div>
          
          <div class="overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="bg-gray-50 text-left text-gray-600 text-sm">
                  <th class="px-6 py-3 font-medium">Ticket</th>
                  <th class="px-6 py-3 font-medium">Priorité</th>
                  <th class="px-6 py-3 font-medium">Statut</th>
                  <th class="px-6 py-3 font-medium">Dernière mise à jour</th>
                  <th class="px-6 py-3 font-medium">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tickets as $ticket)
               
                <tr class="border-t 
                            {{ $ticket->status == 'En cours' ? ' hover:bg-gray-50' : '' }}
                            {{ $ticket->status == 'Résolu' ? ' bg-green-50' : '' }}
                             {{ $ticket->status == 'Fermé' ? ' bg-blue-50 ' : '' }}">

                    <td class="px-6 py-4">
                      <div>
                        <p class="font-medium">{{$ticket->title}}</p>
                        <p class="text-sm text-gray-500">{{$ticket->system}}</p>
                      </div>
                    </td>
                    <td class="px-6 py-4"><span class="px-2 py-1    
                        {{ $ticket->priority == 'Haute' ? ' bg-red-100 text-red-800' : '' }}
                            {{ $ticket->priority == 'Moyenne' ? ' bg-yellow-100 text-yellow-800' : '' }}
                             {{ $ticket->priority == 'Basse' ? ' bg-green-100 text-green-800' : '' }} rounded-full text-xs">{{$ticket->priority}}</span></td>
                    <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">{{$ticket->status}}</span></td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{$ticket->published_at}}</td>
                    <td class="px-6 py-4">
                      <div class="flex space-x-1">
                        <button class="p-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200"><i class="fas fa-eye"></i></button>
                        <button class="p-1 bg-green-100 text-green-600 rounded hover:bg-green-200" onclick="devModal(true, {{ $ticket->id }})"><i class="fas fa-reply"></i></button>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
          <div class="px-6 py-4 border-t">
            <div class="flex justify-between items-center">
              <p class="text-sm text-gray-600">Affichage de 1-5 sur 8 tickets</p>
              <div class="flex space-x-1">
                <button class="px-3 py-1 border rounded bg-gray-100 text-gray-600 hover:bg-gray-200 transition">Précédent</button>
                <button class="px-3 py-1 border rounded bg-blue-600 text-white">1</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">2</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100 text-gray-600 hover:bg-gray-200 transition">Suivant</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Right Sidebar -->
      <div class="lg:col-span-1 space-y-6">
        <!-- Developer Status -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
          <div class="bg-purple-600 px-4 py-4 text-white">
            <h3 class="text-lg font-semibold">Statut des développeurs</h3>
          </div>
          <div class="p-4">
            <div class="space-y-4">
              @foreach($developers as $developer)
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <div>
                    <p class="font-medium">{{ $developer->name }}</p>
                    <p class="text-xs text-gray-500">Full-stack Developer</p> 
                  </div>
                </div>
                <div class="flex items-center">
                  <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs mr-2">
                    {{ $developer->assignments_count }} tickets
                  </span>
                  <span class="w-3 h-3 bg-green-500 rounded-full"></span> 
                </div>
              </div>
            @endforeach
            
       
            </div>
          </div>
        </div>
      
        
        <!-- Performance Stats -->
        <div class="bg-white rounded-lg shadow">
          <div class="px-4 py-3 border-b">
            <h3 class="text-lg font-semibold text-gray-700">Statistiques</h3>
          </div>
          <div class="p-4">
            <div class="space-y-3">
              <div>
                <div class="flex justify-between items-center mb-1">
                  <span class="text-sm font-medium">Tickets résolus aujourd'hui</span>
                  <span class="text-sm text-gray-500">12/32</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                  <div class="bg-green-500 h-2 rounded-full" style="width: 37.5%"></div>
                </div>
              </div>
              
              <div>
                <div class="flex justify-between items-center mb-1">
                  <span class="text-sm font-medium">Temps de réponse moyen</span>
                  <span class="text-sm text-gray-500">3.5h</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                  <div class="bg-blue-500 h-2 rounded-full" style="width: 65%"></div>
                </div>
              </div>
              
              <div>
                <div class="flex justify-between items-center mb-1">
                  <span class="text-sm font-medium">Satisfaction client</span>
                  <span class="text-sm text-gray-500">92%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                  <div class="bg-purple-500 h-2 rounded-full" style="width: 92%"></div>
                </div>
              </div>
            </div>
            
            <div class="mt-5 pt-5 border-t">
              <h4 class="font-medium mb-2 text-sm">Distribution par catégorie</h4>
              <div class="space-y-2">
                <div class="flex justify-between items-center">
                  <span class="text-xs">CRM</span>
                  <span class="text-xs text-gray-500">42 tickets</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-1.5">
                  <div class="bg-blue-500 h-1.5 rounded-full" style="width: 45%"></div>
                </div>
                
                <div class="flex justify-between items-center">
                  <span class="text-xs">SQL Server</span>
                  <span class="text-xs text-gray-500">28 tickets</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-1.5">
                  <div class="bg-blue-500 h-1.5 rounded-full" style="width: 30%"></div>
                </div>
                
                <div class="flex justify-between items-center">
                  <span class="text-xs">Export Tool</span>
                  <span class="text-xs text-gray-500">15 tickets</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-1.5">
                  <div class="bg-blue-500 h-1.5 rounded-full" style="width: 16%"></div>
                </div>
                
                <div class="flex justify-between items-center">
                  <span class="text-xs">Autres</span>
                  <span class="text-xs text-gray-500">9 tickets</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-1.5">
                  <div class="bg-blue-500 h-1.5 rounded-full" style="width: 9%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<div id="assignModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
  <div class="bg-white p-6 rounded-lg shadow-lg w-96">
      <h2 class="text-xl font-bold mb-4">Assign Ticket</h2>
      <form method='POST' action="{{ route('admin.assignTicket') }}">
        @csrf 
        <label class="block text-sm font-medium text-gray-700">Select Developer:</label>
        <select name="developer_id" id="developerSelect" class="w-full border p-2 rounded mt-2">
            <option value="">-- Choose Developer --</option>
            @foreach($developers as $developer)
                <option value="{{ $developer->id }}">{{ $developer->name }}</option>
            @endforeach
        </select>
    
        <input type="hidden" id="ticketId" name="ticket_id">
    
        <div class="flex justify-end mt-4">
            <button type="button" class="bg-gray-300 px-4 py-2 rounded mr-2" onclick="devModal(false)">Cancel</button>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Assign</button>
        </div>
    </form>
    
  </div>
</div>
@endsection

@extends('components.addTicketForm')
        
     