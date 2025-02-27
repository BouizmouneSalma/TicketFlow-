{{-- Main Container --}}
<div class="space-y-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @foreach($softwares as $software)
        {{-- Software Section --}}
        <div class="border-b border-gray-200 dark:border-gray-700 pb-8 transform transition-all duration-300 hover:border-blue-500">
            {{-- Software Header with Arrow --}}
            <div class="flex items-center justify-between mb-6 cursor-pointer group p-4 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-300" 
                 onclick="toggleContent(this)" 
                 data-expanded="false">
                <div class="space-y-2">
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                        {{ $software['name'] }}
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 hidden description transform transition-all duration-500 opacity-0">
                        {{ $software['description'] }}
                    </p>
                </div>
                <svg class="w-6 h-6 transform transition-all duration-300 rotate-[-90deg] text-blue-600 group-hover:scale-110" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>

            {{-- Tickets Grid --}}
            <div class="tickets-container grid-cols-1 md:grid-cols-2 gap-8 hidden opacity-0 transform translate-y-4 transition-all duration-500">
                @foreach($software['tickets'] as $key => $ticket)
                <div class="relative group {{ $key % 2 == 0 ? 'ml-0' : 'ml-12' }} mb-6" onclick="openTicketModal('{{ $ticket['title'] }}', '{{ $ticket['description'] }}', '{{ $ticket['priority'] }}', '{{ $ticket['status'] }}', '{{ $ticket['assigned_to']['name'] }}', '{{ $ticket['assigned_to']['avatar'] }}', '{{ $ticket['id'] ?? $key }}')">
                    <div class="absolute -inset-0.5  rounded-lg blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
                    <div class="relative p-6 bg-white dark:bg-gray-800 rounded-lg ring-1 ring-gray-900/5 shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $ticket['priority'] === 'High' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : 
                                   ($ticket['priority'] === 'Medium' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' : 
                                   'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200') }}">
                                {{ $ticket['priority'] }}
                            </span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $ticket['created_at'] }}</span>
                        </div>
                        
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 transition-colors duration-200">
                            {{ $ticket['title'] }}
                        </h3>
                        
                        <p class="text-gray-500 dark:text-gray-400 mb-6 line-clamp-2">
                            {{ $ticket['description'] }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center group/avatar">
                                <img class="h-10 w-10 rounded-full ring-2 ring-blue-500 transform transition-transform duration-300 group-hover/avatar:scale-110" 
                                     src="{{ $ticket['assigned_to']['avatar'] }}" 
                                     alt="">
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white group-hover/avatar:text-blue-600 transition-colors duration-200">
                                        {{ $ticket['assigned_to']['name'] }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Assigned to
                                    </p>
                                </div>
                            </div>
                            
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-medium transition-colors duration-200
                                {{ $ticket['status'] === 'Open' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' :
                                   ($ticket['status'] === 'In Progress' ? 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200' :
                                   'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200') }}">
                                {{ $ticket['status'] }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

{{-- Ticket Modal --}}
<div id="ticketModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" onclick="closeTicketModal()"></div>
    
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white dark:bg-gray-900 w-full max-w-2xl rounded-xl shadow-2xl transform transition-all duration-300 opacity-0 translate-y-8" id="modalContent">
            <div class="absolute top-0 right-0 pt-4 pr-4">
                <button type="button" onclick="closeTicketModal()" class="rounded-md bg-white dark:bg-gray-900 text-gray-400 hover:text-gray-500 focus:outline-none">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="p-6 sm:p-8">
                <div class="mb-4">
                    <h3 id="modalTicketTitle" class="text-2xl font-bold text-gray-900 dark:text-white bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent"></h3>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-center">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mr-3">Priority:</h4>
                        <span id="modalTicketPriority" class="px-3 py-1 rounded-full text-sm font-medium"></span>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</h4>
                        <p id="modalTicketDescription" class="mt-2 text-gray-700 dark:text-gray-300"></p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</h4>
                            <select id="ticketStatusSelect" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md dark:bg-gray-800 dark:border-gray-700">
                                <option value="Open">Open</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Closed">Closed</option>
                            </select>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Created</h4>
                            <p id="modalTicketDate" class="mt-2 text-gray-700 dark:text-gray-300">May 26, 2023</p>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-4">Assign Developer</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4" id="developersList">
                            <!-- Developer options will be populated here -->
                            <div class="developer-card relative border border-gray-200 dark:border-gray-700 rounded-lg p-4 cursor-pointer hover:border-blue-500 transition-all duration-200">
                                <input type="radio" name="developer" value="1" class="absolute opacity-0">
                                <div class="flex flex-col items-center">
                                    <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Developer" class="w-16 h-16 rounded-full mb-3">
                                    <h5 class="font-medium">John Doe</h5>
                                    <p class="text-xs text-gray-500">Senior Developer</p>
                                </div>
                            </div>
                            <div class="developer-card relative border border-gray-200 dark:border-gray-700 rounded-lg p-4 cursor-pointer hover:border-blue-500 transition-all duration-200">
                                <input type="radio" name="developer" value="2" class="absolute opacity-0">
                                <div class="flex flex-col items-center">
                                    <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="Developer" class="w-16 h-16 rounded-full mb-3">
                                    <h5 class="font-medium">Jane Smith</h5>
                                    <p class="text-xs text-gray-500">Full Stack Dev</p>
                                </div>
                            </div>
                            <div class="developer-card relative border border-gray-200 dark:border-gray-700 rounded-lg p-4 cursor-pointer hover:border-blue-500 transition-all duration-200">
                                <input type="radio" name="developer" value="3" class="absolute opacity-0">
                                <div class="flex flex-col items-center">
                                    <img src="https://randomuser.me/api/portraits/men/2.jpg" alt="Developer" class="w-16 h-16 rounded-full mb-3">
                                    <h5 class="font-medium">Mike Wilson</h5>
                                    <p class="text-xs text-gray-500">Backend Dev</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3 mt-8">
                        <button onclick="closeTicketModal()" class="px-4 py-2 border border-gray-300 dark:border-gray-700 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
                            Cancel
                        </button>
                        <button onclick="saveTicketChanges()" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Enhanced script with smooth animations --}}
<script>
    function toggleContent(element) {
        const ticketsContainer = element.parentElement.querySelector('.tickets-container');
        const description = element.querySelector('.description');
        const arrow = element.querySelector('svg');
        const isExpanded = element.dataset.expanded === 'true';
        
        if (isExpanded) {
            ticketsContainer.style.opacity = '0';
            ticketsContainer.style.transform = 'translateY(1rem)';
            description.style.opacity = '0';
            arrow.style.transform = 'rotate(-90deg)';
            
            setTimeout(() => {
                ticketsContainer.classList.add('hidden');
                ticketsContainer.classList.remove('grid');
                description.classList.add('hidden');
            }, 300);
        } else {
            ticketsContainer.classList.remove('hidden');
            ticketsContainer.classList.add('grid');
            description.classList.remove('hidden');
            
            // Trigger reflow
            ticketsContainer.offsetHeight;
            
            ticketsContainer.style.opacity = '1';
            ticketsContainer.style.transform = 'translateY(0)';
            description.style.opacity = '1';
            arrow.style.transform = 'rotate(0deg)';
        }
        
        element.dataset.expanded = !isExpanded;
    }
    
    // Ticket Modal functionality
    let currentTicketId = null;
    
    function openTicketModal(title, description, priority, status, assignedTo, assignedAvatar, ticketId) {
        currentTicketId = ticketId;
        const modal = document.getElementById('ticketModal');
        const modalContent = document.getElementById('modalContent');
        
        // Set modal content
        document.getElementById('modalTicketTitle').textContent = title;
        document.getElementById('modalTicketDescription').textContent = description;
        
        // Set ticket priority with appropriate styling
        const priorityElement = document.getElementById('modalTicketPriority');
        priorityElement.textContent = priority;
        
        // Reset priority class
        priorityElement.className = 'px-3 py-1 rounded-full text-sm font-medium';
        
        // Add appropriate class based on priority
        if (priority === 'High') {
            priorityElement.classList.add('bg-red-100', 'text-red-800', 'dark:bg-red-900', 'dark:text-red-200');
        } else if (priority === 'Medium') {
            priorityElement.classList.add('bg-yellow-100', 'text-yellow-800', 'dark:bg-yellow-900', 'dark:text-yellow-200');
        } else {
            priorityElement.classList.add('bg-green-100', 'text-green-800', 'dark:bg-green-900', 'dark:text-green-200');
        }
        
        // Set status dropdown
        document.getElementById('ticketStatusSelect').value = status;
        
        // Set current assignee
        highlightAssignedDeveloper(assignedTo);
        
        // Show modal with animation
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.style.opacity = '1';
            modalContent.style.transform = 'translateY(0)';
        }, 10);
        
        // Add event listeners to developer cards
        setupDeveloperCardListeners();
    }
    
    function closeTicketModal() {
        const modal = document.getElementById('ticketModal');
        const modalContent = document.getElementById('modalContent');
        
        // Hide with animation
        modalContent.style.opacity = '0';
        modalContent.style.transform = 'translateY(8px)';
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
    
    function setupDeveloperCardListeners() {
        const developerCards = document.querySelectorAll('.developer-card');
        developerCards.forEach(card => {
            card.addEventListener('click', function() {
                // Deselect all cards
                developerCards.forEach(c => c.classList.remove('ring-2', 'ring-blue-500'));
                
                // Select the clicked card
                this.classList.add('ring-2', 'ring-blue-500');
                
                // Check the radio button
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
            });
        });
    }
    
    function highlightAssignedDeveloper(developerName) {
        // This is a simple implementation - in a real app you would match by ID
        const developerCards = document.querySelectorAll('.developer-card');
        developerCards.forEach(card => {
            card.classList.remove('ring-2', 'ring-blue-500');
            const name = card.querySelector('h5').textContent;
            if (name === developerName) {
                card.classList.add('ring-2', 'ring-blue-500');
                const radio = card.querySelector('input[type="radio"]');
                radio.checked = true;
            }
        });
    }
    
    function saveTicketChanges() {
        // Get selected values
        const status = document.getElementById('ticketStatusSelect').value;
        const selectedDeveloper = document.querySelector('input[name="developer"]:checked');
        
        if (!selectedDeveloper) {
            alert('Please select a developer to assign this ticket.');
            return;
        }
        
        const developerId = selectedDeveloper.value;
        const developerName = selectedDeveloper.closest('.developer-card').querySelector('h5').textContent;
        const developerAvatar = selectedDeveloper.closest('.developer-card').querySelector('img').src;
        
        // Here you would send an AJAX request to update the ticket
        // For example:
        /*
        fetch('/api/tickets/' + currentTicketId, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                status: status,
                developer_id: developerId
            })
        })
        .then(response => response.json())
        .then(data => {
            // Handle response, perhaps show a success message
            closeTicketModal();
            // Maybe refresh the ticket display
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to update ticket. Please try again.');
        });
        */
        
        // For now, just close the modal
        alert('Ticket assigned to ' + developerName + ' with status: ' + status);
        closeTicketModal();
    }
    
    // Initialize developer cards when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        setupDeveloperCardListeners();
    });
</script>