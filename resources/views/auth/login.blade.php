<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Questions Localisées</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-lg shadow-md max-w-md w-full">
        <!-- En-tête -->
        <div class="text-center p-5 bg-blue-50 rounded-t-lg border-b">
            <div class="inline-block bg-blue-500 p-2 rounded-full mb-2">
                <i class="fas fa-headset text-white text-2xl"></i>
            </div>
            <h1 class="text-xl font-bold text-gray-800">Connexion</h1>
        </div>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('login') }}" class="p-6">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <i class="fas fa-envelope text-gray-400 text-sm"></i>
                    </div>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                           class="w-full py-2 pl-10 pr-3 border rounded-md text-sm">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Mot de passe -->
            <div class="mb-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <i class="fas fa-lock text-gray-400 text-sm"></i>
                    </div>
                    <input type="password" name="password" id="password" required autocomplete="current-password" placeholder="Mot de passe"
                           class="w-full py-2 pl-10 pr-3 border rounded-md text-sm">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end mt-1">
                    <a href="{{ route('password.request') }}" class="text-xs text-blue-600 hover:text-blue-800">
                        Mot de passe oublié?
                    </a>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Se souvenir de moi</span>
                </label>
            </div>

            <!-- Bouton de connexion -->
            <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 mt-4">
                <i class="fas fa-sign-in-alt mr-1"></i> Se connecter
            </button>

            <!-- Lien d'inscription -->
            <div class="text-center text-sm mt-4">
                <p class="text-gray-600">
                    Pas encore de compte? <a href="{{ route('register') }}" class="text-blue-600">Inscrivez-vous</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>
