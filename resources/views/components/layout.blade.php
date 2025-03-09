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
              <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="bg-transparent border-none cursor-pointer">
                    <i class="fas fa-sign-out-alt text-white text-lg hover:text-red-500 transition"></i>
                </button>
            </form>
            
            
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

