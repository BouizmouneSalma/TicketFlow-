@extends('components.layout')
@section('title', 'GeoQuestions Maroc - Plateforme Communautaire')
@section('content')
  <!-- Main Content -->
  <div class="container mx-auto px-4 py-6 flex-grow">
    <!-- Welcome Banner -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6 border-l-4 border-blue-500">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
        <div>
          <h2 class="text-2xl font-bold text-gray-800">Bonjour, {{Auth::user()->name}}</h2>
          <p class="text-gray-600 mt-1">Bienvenue dans votre espace de support personnalisé</p>
        </div>
        <button onclick="toggleModal(true) "class="mt-4 md:mt-0 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition flex items-center">
          <i class="fas fa-plus mr-2"></i> Créer un nouveau ticket
        </button>
      </div>
    </div>

    <!-- Ticket Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
      <div class="bg-white rounded-lg shadow p-4 border-b-4 border-blue-500">
        <div class="flex justify-between items-center">
          <div>
            <p class="text-gray-500">Tickets totaux</p>
            <h3 class="text-2xl font-bold">8</h3>
          </div>
          <div class="bg-blue-100 p-3 rounded-full">
            <i class="fas fa-ticket-alt text-blue-600 text-xl"></i>
          </div>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow p-4 border-b-4 border-yellow-500">
        <div class="flex justify-between items-center">
          <div>
            <p class="text-gray-500">En cours</p>
            <h3 class="text-2xl font-bold">3</h3>
          </div>
          <div class="bg-yellow-100 p-3 rounded-full">
            <i class="fas fa-spinner text-yellow-600 text-xl"></i>
          </div>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow p-4 border-b-4 border-green-500">
        <div class="flex justify-between items-center">
          <div>
            <p class="text-gray-500">Résolus</p>
            <h3 class="text-2xl font-bold">5</h3>
          </div>
          <div class="bg-green-100 p-3 rounded-full">
            <i class="fas fa-check-circle text-green-600 text-xl"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content Section -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
      <!-- Tickets List -->
      <div class="lg:col-span-3">
        <div class="bg-white rounded-lg shadow">
          <div class="px-6 py-4 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-700">Vos tickets</h3>
            <div class="flex space-x-2">
              <button class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm font-medium hover:bg-blue-200 transition">
                Tous (8)
              </button>
              <button class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-sm font-medium hover:bg-gray-200 transition">
                Actifs (3)
              </button>
              <button class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-sm font-medium hover:bg-gray-200 transition">
                Résolus (5)
              </button>
            </div>
          </div>
          
          <!-- Search and Filter -->
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
          
          <!-- Tickets Table -->
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
                <!-- Active Ticket with Recent Response -->
                <tr class="border-t hover:bg-blue-50 bg-blue-50">
                  <td class="px-6 py-4">
                    <div>
                      <div class="flex items-center mb-1">
                        <p class="font-medium">Impossible d'exporter les rapports PDF</p>
                        <span class="ml-2 px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Nouveau message</span>
                      </div>
                      <p class="text-sm text-gray-500">Windows 11 • Export Tool</p>
                    </div>
                  </td>
                  <td class="px-6 py-4"><span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Haute</span></td>
                  <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">En cours</span></td>
                  <td class="px-6 py-4 text-sm text-gray-500">Il y a 1 heure</td>
                  <td class="px-6 py-4">
                    <div class="flex space-x-1">
                      <button class="p-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200"><i class="fas fa-eye"></i></button>
                      <button class="p-1 bg-green-100 text-green-600 rounded hover:bg-green-200"><i class="fas fa-reply"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Normal Active Ticket -->
                <tr class="border-t hover:bg-gray-50">
                  <td class="px-6 py-4">
                    <div>
                      <p class="font-medium">Erreur lors de l'importation des données clients</p>
                      <p class="text-sm text-gray-500">MacOS • CRM</p>
                    </div>
                  </td>
                  <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Moyenne</span></td>
                  <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">En cours</span></td>
                  <td class="px-6 py-4 text-sm text-gray-500">Hier, 14:30</td>
                  <td class="px-6 py-4">
                    <div class="flex space-x-1">
                      <button class="p-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200"><i class="fas fa-eye"></i></button>
                      <button class="p-1 bg-green-100 text-green-600 rounded hover:bg-green-200"><i class="fas fa-reply"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Another Active Ticket -->
                <tr class="border-t hover:bg-gray-50">
                  <td class="px-6 py-4">
                    <div>
                      <p class="font-medium">La synchronisation des données ne fonctionne pas</p>
                      <p class="text-sm text-gray-500">Linux • SQL Server</p>
                    </div>
                  </td>
                  <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Basse</span></td>
                  <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">En cours</span></td>
                  <td class="px-6 py-4 text-sm text-gray-500">20 Feb, 2025</td>
                  <td class="px-6 py-4">
                    <div class="flex space-x-1">
                      <button class="p-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200"><i class="fas fa-eye"></i></button>
                      <button class="p-1 bg-green-100 text-green-600 rounded hover:bg-green-200"><i class="fas fa-reply"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Resolved Ticket -->
                <tr class="border-t hover:bg-gray-50 text-gray-500">
                  <td class="px-6 py-4">
                    <div>
                      <p class="font-medium">Interface qui ne s'affiche pas correctement</p>
                      <p class="text-sm">Windows 10 • CRM</p>
                    </div>
                  </td>
                  <td class="px-6 py-4"><span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">Moyenne</span></td>
                  <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Résolu</span></td>
                  <td class="px-6 py-4 text-sm">15 Feb, 2025</td>
                  <td class="px-6 py-4">
                    <div class="flex space-x-1">
                      <button class="p-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200"><i class="fas fa-eye"></i></button>
                      <button class="p-1 bg-gray-100 text-gray-500 rounded"><i class="fas fa-thumbs-up"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Resolved Ticket Awaiting Confirmation -->
                <tr class="border-t hover:bg-gray-50 bg-green-50">
                  <td class="px-6 py-4">
                    <div>
                      <div class="flex items-center mb-1">
                        <p class="font-medium">Problème de connexion à l'application</p>
                        <span class="ml-2 px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Résolu - En attente de confirmation</span>
                      </div>
                      <p class="text-sm text-gray-500">Windows 10 • Login Module</p>
                    </div>
                  </td>
                  <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Moyenne</span></td>
                  <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Résolu</span></td>
                  <td class="px-6 py-4 text-sm text-gray-500">18 Feb, 2025</td>
                  <td class="px-6 py-4">
                    <div class="flex space-x-1">
                      <button class="p-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200"><i class="fas fa-eye"></i></button>
                      <button class="p-1 bg-green-100 text-green-600 rounded hover:bg-green-200"><i class="fas fa-check"></i></button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <!-- Pagination -->
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
        <!-- Support Info -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
          <div class="bg-blue-600 px-4 py-4 text-white">
            <h3 class="text-lg font-semibold">Besoin d'aide ?</h3>
          </div>
          <div class="p-4">
            <div class="mb-4 pb-4 border-b">
              <h4 class="font-medium mb-2">Support technique</h4>
              <div class="flex items-center mb-2">
                <i class="fas fa-phone-alt text-blue-600 mr-2"></i>
                <p class="text-sm">+33 1 23 45 67 89</p>
              </div>
              <div class="flex items-center">
                <i class="fas fa-envelope text-blue-600 mr-2"></i>
                <p class="text-sm">support@supportflow.com</p>
              </div>
            </div>
            <div>
              <h4 class="font-medium mb-2">Heures d'ouverture</h4>
              <p class="text-sm mb-1">Lundi - Vendredi: 8h30 - 18h00</p>
              <p class="text-sm">Samedi: 9h00 - 12h00</p>
            </div>
          </div>
        </div>
        
        <!-- Quick Access -->
        <div class="bg-white rounded-lg shadow">
          <div class="px-4 py-3 border-b">
            <h3 class="text-lg font-semibold text-gray-700">Accès rapide</h3>
          </div>
          <div class="p-4">
            <div class="space-y-3">
              <a href="#" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                  <i class="fas fa-book text-blue-600"></i>
                </div>
                <span>Base de connaissances</span>
              </a>
              <a href="#" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                  <i class="fas fa-question-circle text-purple-600"></i>
                </div>
                <span>FAQ</span>
              </a>
              <a href="#" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center mr-3">
                  <i class="fas fa-video text-green-600"></i>
                </div>
                <span>Tutoriels vidéo</span>
              </a>
              <a href="#" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center mr-3">
                  <i class="fas fa-download text-yellow-600"></i>
                </div>
                <span>Téléchargements</span>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Recent Activity -->
        <div class="bg-white rounded-lg shadow">
          <div class="px-4 py-3 border-b">
            <h3 class="text-lg font-semibold text-gray-700">Activité récente</h3>
          </div>
          <div class="p-4">
            <div class="space-y-4">
              <div class="flex items-start">
                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mt-1 mr-3 flex-shrink-0">
                  <i class="fas fa-comment-alt text-blue-600 text-sm"></i>
                </div>
                <div>
                  <p class="text-sm">Le technicien <span class="font-medium">Pierre Dupont</span> a répondu à votre ticket <span class="font-medium">Impossible d'exporter les rapports PDF</span></p>
                  <p class="text-xs text-gray-500 mt-1">Il y a 1 heure</p>
                </div>
              </div>
              <div class="flex items-start">
                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center mt-1 mr-3 flex-shrink-0">
                  <i class="fas fa-check-circle text-green-600 text-sm"></i>
                </div>
                <div>
                  <p class="text-sm">Votre ticket <span class="font-medium">Problème de connexion à l'application</span> a été marqué comme résolu</p>
                  <p class="text-xs text-gray-500 mt-1">Hier, 16:45</p>
                </div>
              </div>
              <div class="flex items-start">
                <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center mt-1 mr-3 flex-shrink-0">
                  <i class="fas fa-plus-circle text-purple-600 text-sm"></i>
                </div>
                <div>
                  <p class="text-sm">Vous avez créé un nouveau ticket <span class="font-medium">Erreur lors de l'importation des données clients</span></p>
                  <p class="text-xs text-gray-500 mt-1">Hier, 10:30</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection

  @extends('components.addTicketForm')





  