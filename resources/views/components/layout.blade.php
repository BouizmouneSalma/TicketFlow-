<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title> 
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    
    <header class="bg-blue-600 shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
          <div class="flex items-center space-x-2">
            <i class="fas fa-headset text-white text-2xl"></i>
            <h1 class="text-white text-xl font-bold">SupportFlow</h1>
          </div>
          <div class="flex items-center space-x-4">
            <div class="relative">
              <i class="fas fa-bell text-white text-lg cursor-pointer"></i>
              <span class="absolute top-0 right-0 -mt-1 -mr-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">2</span>
            </div>
            <div class="flex items-center space-x-2">
              <div class="w-8 h-8 bg-blue-300 rounded-full flex items-center justify-center">
                <span class="text-blue-700 font-semibold">{{ Str::substr(Str::before(Auth::user()->name, ' '), 0, 1) }}{{ Str::substr(Str::after(Auth::user()->name, ' '), 0, 1) }}</span>
              </div>
              <span class="text-white">{{Auth::user()->name}}</span>
              <i class="fas fa-sign-out-alt text-white text-lg cursor-pointer hover:text-red-500 transition"></i>
            </div>
          </div>
          
        </div>
        
      </header>
    

    <div >
        @yield('content') 
    </div>

    <footer class="bg-white border-t mt-auto">
        <div class="container mx-auto px-4 py-4">
          <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-600 text-sm">© 2025 SupportFlow. Tous droits réservés.</p>
            <div class="flex space-x-4 mt-3 md:mt-0">
              <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Centre d'aide</a>
              <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Politique de confidentialité</a>
              <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Conditions d'utilisation</a>
              <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Contact</a>
            </div>
          </div>
        </div>
      </footer>
</body>
</html>
<div id="ticketModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-md hidden transition-opacity duration-300">
    <div class="bg-white w-full max-w-lg p-6 rounded-2xl shadow-2xl transform scale-95 transition-all duration-300">
        <div class="flex justify-between items-center border-b pb-3">
            <h2 class="text-2xl font-bold text-gray-800">Publier une Question</h2>
            <button onclick="toggleModal(false)" class="text-gray-500 hover:text-gray-800 text-2xl font-bold">&times;</button>
        </div>

        <form action="" method="POST" class="space-y-5 mt-4">
            @csrf 
            
            <div>
                <label for="title" class="block text-gray-700 font-semibold mb-1">Titre</label>
                <input type="text" id="title" name="title" placeholder="Ex: Où trouver un bon café ?" 
                       class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-300 transition"
                       value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-gray-700 font-semibold mb-1">Détail</label>
                <textarea id="content" name="content" rows="4" placeholder="Décrivez votre question..."
                          class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-300 transition" required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="location" class="block text-gray-700 font-semibold mb-1">Localisation</label>
                <select id="location" name="location"
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-300 transition" required>
                    <option value="" disabled selected>Chargement...</option>
                </select>

                @error('location')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" onclick="toggleModal(false)" class="bg-gray-300 text-gray-700 px-5 py-2.5 rounded-lg hover:bg-gray-400 transition shadow-md">
                    Annuler
                </button>
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-2.5 rounded-lg shadow-lg hover:shadow-xl transition">
                    Publier
                </button>
            </div>
        </form>
    </div>
</div>


{{-- 
<!-- Modal Overlay -->
<div id="ticketModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 ">
  <div class="flex justify-center items-center h-full">
    <div class="bg-white rounded-lg w-full max-w-3xl p-6 space-y-6 shadow-lg">
      
      <!-- Modal Header -->
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Soumettre un Ticket</h2>
        <button id="closeModal" class="text-gray-600 hover:text-gray-800 text-2xl">&times;</button>
      </div>

      <!-- Ticket Form -->
      <form id="ticketForm" class="space-y-6">
        
        <!-- Title -->
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre*</label>
          <input type="text" id="title" name="title" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Titre descriptif du problème">
        </div>

        <!-- Description -->
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description*</label>
          <textarea id="description" name="description" rows="4" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Décrivez le problème en détail..."></textarea>
        </div>

        <!-- Priority -->
        <div>
          <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">Priorité*</label>
          <select id="priority" name="priority" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <option value="">Sélectionnez une priorité</option>
            <option value="Haute">Haute</option>
            <option value="Moyenne">Moyenne</option>
            <option value="Basse">Basse</option>
          </select>
        </div>

        <!-- OS -->
        <div>
          <label for="os" class="block text-sm font-medium text-gray-700 mb-1">Système d'exploitation*</label>
          <select id="os" name="os" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <option value="">Sélectionnez un OS</option>
            <option value="Windows 10">Windows 10</option>
            <option value="Windows 11">Windows 11</option>
            <option value="macOS">macOS</option>
            <option value="Linux">Linux</option>
            <option value="Android">Android</option>
            <option value="iOS">iOS</option>
            <option value="Autre">Autre</option>
          </select>
        </div>

        <!-- Software -->
        <div>
          <label for="softwareId" class="block text-sm font-medium text-gray-700 mb-1">Logiciel concerné*</label>
          <select id="softwareId" name="softwareId" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <option value="">Sélectionnez un logiciel</option>
            <option value="1">SQL Server</option>
            <option value="2">Export Tool</option>
            <option value="3">Reporting Tool</option>
            <option value="4">Import Module</option>
            <option value="5">User Management</option>
            <option value="6">Billing System</option>
            <option value="7">Autre</option>
          </select>
        </div>

        <!-- File Attachment -->
        <div>
          <label for="attachment" class="block text-sm font-medium text-gray-700 mb-1">Pièce jointe (Optionnel)</label>
          <div class="flex items-center space-x-2">
            <label class="flex items-center px-4 py-2 bg-white text-indigo-600 rounded-md border border-indigo-300 cursor-pointer hover:bg-indigo-50">
              <i class="fas fa-paperclip mr-2"></i>
              <span>Choisir un fichier</span>
              <input type="file" id="attachment" name="attachment" class="hidden">
            </label>
            <span id="fileName" class="text-sm text-gray-500">Aucun fichier sélectionné</span>
          </div>
          <p class="text-xs text-gray-500 mt-1">Max 5MB. Formats acceptés: PDF, JPG, PNG</p>
        </div>

        <!-- Optional Additional Information -->
        <div>
          <div class="flex items-center mb-2">
            <i class="fas fa-info-circle text-indigo-500 mr-2"></i>
            <span class="text-sm font-medium text-gray-700">Informations supplémentaires (Optionnel)</span>
          </div>
          <div class="border rounded-md p-4 space-y-3 bg-gray-50">
            <!-- Reproduction Steps -->
            <div>
              <label for="steps" class="block text-sm font-medium text-gray-700 mb-1">Étapes pour reproduire</label>
              <textarea id="steps" name="steps" rows="2" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Étapes pour reproduire le problème..."></textarea>
            </div>

            <!-- Expected behavior -->
            <div>
              <label for="expected" class="block text-sm font-medium text-gray-700 mb-1">Comportement attendu</label>
              <input type="text" id="expected" name="expected" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Ce qui devrait se passer...">
            </div>
          </div>
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end space-x-3 pt-4 border-t">
          <button type="button" id="cancelBtn" class="px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-100">Annuler</button>
          <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"><i class="fas fa-paper-plane mr-2"></i>Soumettre le ticket</button>
        </div>
      </form>
    </div>
  </div>
</div> --}}

<div id="loginModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-md hidden transition-opacity duration-300">
    <div class="bg-white w-full max-w-lg p-6 rounded-2xl shadow-2xl transform scale-95 transition-all duration-300">
            <h2 class="text-xl font-bold mb-4">Connexion requise</h2>
            <p class="mb-4">Vous devez être connecté pour poser une question.</p>
            <div class="flex justify-end">
                <button onclick="toggleLoginModal(false)" class="px-4 py-2 bg-gray-400 text-white rounded-md">Annuler</button>
                <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md ml-2">Se connecter</a>
            </div>


    </div>
</div>

<div id="loginModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
 
</div>


<script src="{{ asset('assets/js/auth.js') }}"></script>  

{{-- <script src="{{ asset('assets/js/fitchCities.js') }}"></script>   --}}

