<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SupportFlow - Votre plateforme de support technique</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'gradient': 'gradientAnimation 15s ease infinite',
                        'float': 'float 12s infinite ease-in-out',
                        'particle': 'particleAnimation 7s infinite',
                        'pulse': 'pulse 2s infinite',
                        'typing': 'typingAnimation 1.5s infinite ease-in-out',
                        'shine': 'shine 3s infinite',
                    },
                    keyframes: {
                        gradientAnimation: {
                            '0%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                            '100%': { backgroundPosition: '0% 50%' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0) translateX(0) rotate(0deg)' },
                            '25%': { transform: 'translateY(-20px) translateX(10px) rotate(5deg)' },
                            '50%': { transform: 'translateY(10px) translateX(20px) rotate(10deg)' },
                            '75%': { transform: 'translateY(20px) translateX(-10px) rotate(5deg)' }
                        },
                        particleAnimation: {
                            '0%': { transform: 'translateY(0) translateX(0)', opacity: '0' },
                            '50%': { opacity: '1' },
                            '100%': { transform: 'translateY(-100px) translateX(50px)', opacity: '0' }
                        },
                        pulse: {
                            '0%, 100%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.05)' }
                        },
                        typingAnimation: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' }
                        },
                        shine: {
                            '0%': { left: '-100%' },
                            '20%': { left: '100%' },
                            '100%': { left: '100%' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans m-0 p-0 box-border">
  <section class="min-h-screen relative overflow-hidden bg-gradient-to-br from-indigo-700 via-indigo-500 to-blue-800 bg-[length:400%_400%] animate-gradient">
    <!-- Animated Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full z-0">
      <div class="absolute w-72 h-72 rounded-full bg-white bg-opacity-10 top-[-150px] right-[-50px] animate-float"></div>
      <div class="absolute w-48 h-48 rounded-full bg-white bg-opacity-10 bottom-[50px] left-[-100px] animate-float delay-200"></div>
      <div class="absolute w-36 h-36 rounded-full bg-white bg-opacity-10 top-[40%] right-[20%] animate-float delay-300"></div>
      <div class="absolute w-20 h-20 rounded-full bg-white bg-opacity-10 bottom-[20%] right-[10%] animate-float backdrop-blur border border-white border-opacity-10"></div>
      <div class="absolute w-28 h-28 rounded-full bg-white bg-opacity-10 top-[60%] left-[15%] animate-float delay-300 backdrop-blur border border-white border-opacity-10"></div>
      
      <!-- Particles -->
      <div id="particles-container"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute z-0">
      <div class="absolute top-[20%] right-[15%] bg-white bg-opacity-10 backdrop-blur-md rounded-xl p-4 flex items-center shadow-lg border border-white border-opacity-10 animate-float delay-100">
        <i class="fas fa-comment-dots text-white text-2xl mr-3 bg-white bg-opacity-10 w-10 h-10 flex justify-center items-center rounded-lg"></i>
        <div class="text-white font-medium text-sm">
          Support en direct
          <span class="block text-xs opacity-80 mt-1">Réponse en 5 min</span>
        </div>
      </div>
      
      <div class="absolute bottom-[25%] left-[12%] bg-white bg-opacity-10 backdrop-blur-md rounded-xl p-4 flex items-center shadow-lg border border-white border-opacity-10 animate-float delay-300">
        <i class="fas fa-ticket-alt text-white text-2xl mr-3 bg-white bg-opacity-10 w-10 h-10 flex justify-center items-center rounded-lg"></i>
        <div class="text-white font-medium text-sm">
          Suivi des tickets
          <span class="block text-xs opacity-80 mt-1">Mise à jour en temps réel</span>
        </div>
      </div>
      
      <div class="absolute top-[65%] right-[25%] bg-white bg-opacity-10 backdrop-blur-md rounded-xl p-4 flex items-center shadow-lg border border-white border-opacity-10 animate-float delay-200">
        <i class="fas fa-chart-line text-white text-2xl mr-3 bg-white bg-opacity-10 w-10 h-10 flex justify-center items-center rounded-lg"></i>
        <div class="text-white font-medium text-sm">
          Statistiques détaillées
          <span class="block text-xs opacity-80 mt-1">Visualisez vos métriques</span>
        </div>
      </div>
      
      <div class="absolute top-[15%] left-[10%] flex items-center py-2 px-3 bg-white bg-opacity-10 backdrop-blur-md rounded-full border border-white border-opacity-10 text-white text-sm shadow-lg animate-float delay-150">
        <i class="fas fa-shield-alt text-indigo-300 mr-2"></i> Sécurité renforcée
      </div>
      
      <div class="absolute bottom-[15%] right-[30%] flex items-center py-2 px-3 bg-white bg-opacity-10 backdrop-blur-md rounded-full border border-white border-opacity-10 text-white text-sm shadow-lg animate-float delay-250">
        <i class="fas fa-sync-alt text-indigo-300 mr-2"></i> Mises à jour automatiques
      </div>
      
      <div class="absolute bottom-10 right-[5%] bg-white rounded-xl py-2 px-4 flex items-center shadow-lg z-10 transform rotate-3">
        <div class="flex mr-2">
          <i class="fas fa-star text-amber-400 text-sm mr-0.5"></i>
          <i class="fas fa-star text-amber-400 text-sm mr-0.5"></i>
          <i class="fas fa-star text-amber-400 text-sm mr-0.5"></i>
          <i class="fas fa-star text-amber-400 text-sm mr-0.5"></i>
          <i class="fas fa-star-half-alt text-amber-400 text-sm"></i>
        </div>
        <div class="text-sm font-semibold text-gray-800">4.8/5 (2,305 avis)</div>
      </div>
    </div>

    <div class="w-11/12 max-w-6xl mx-auto py-5 relative z-10">
      <!-- Navigation -->
      <nav class="flex justify-between items-center py-5">
        <div class="flex items-center text-white font-bold text-2xl">
          <i class="fas fa-headset text-3xl mr-2 text-white shadow-[0_0_10px_rgba(255,255,255,0.5)]"></i>
          <span>SupportFlow</span>
        </div>
        <div class="hidden md:flex items-center gap-8">
          <a href="#" class="bg-white text-indigo-600 py-2 px-6 rounded-full font-semibold transition duration-300 ease-in-out shadow-md hover:bg-opacity-90 hover:-translate-y-1 hover:shadow-lg">Connexion</a>
        </div>
        <button class="block md:hidden bg-transparent border-none text-white text-2xl cursor-pointer">
          <i class="fas fa-bars"></i>
        </button>
      </nav>

      <!-- Hero Content -->
      <div class="flex flex-col md:flex-row md:justify-between md:items-center mt-10 md:mt-16 px-4 md:px-0">
        <div class="text-center md:text-left mb-10 md:mb-0 md:max-w-[45%] relative">
          <div class="inline-block bg-gradient-to-r from-red-500 to-red-600 text-white text-sm font-bold py-1.5 px-3 rounded-full mb-4 shadow-md relative overflow-hidden">
            <div class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-white via-opacity-40 to-transparent animate-shine"></div>
            <i class="fas fa-rocket"></i> Nouvelle version 3.0
          </div>
          
          <h1 class="text-white text-4xl md:text-5xl font-extrabold leading-tight mb-5 shadow-sm">
            Support technique <span class="text-indigo-300 inline-block relative">intelligent
              <span class="absolute w-full h-1 bg-indigo-300 bg-opacity-30 bottom-1 left-0 -z-10"></span>
            </span>
          </h1>
          
          <p class="text-white text-opacity-90 text-lg leading-relaxed mb-8">
            Une plateforme intuitive qui résout vos problèmes techniques en un temps record, avec suivi personnalisé de vos demandes et intégration IA.
          </p>
          
          <div class="flex flex-wrap gap-4 mb-8">
            <div class="flex items-center text-white text-base">
              <i class="fas fa-check-circle text-indigo-300 mr-2"></i> Support 24/7
            </div>
            <div class="flex items-center text-white text-base">
              <i class="fas fa-check-circle text-indigo-300 mr-2"></i> IA prédictive
            </div>
            <div class="flex items-center text-white text-base">
              <i class="fas fa-check-circle text-indigo-300 mr-2"></i> Réponse en 5 minutes
            </div>
            <div class="flex items-center text-white text-base">
              <i class="fas fa-check-circle text-indigo-300 mr-2"></i> Multi-plateformes
            </div>
          </div>
          
          <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
            <a href="/login" class="flex items-center justify-center py-3.5 px-7 bg-white text-indigo-700 font-semibold rounded-lg transition duration-300 ease-in-out shadow-md relative overflow-hidden z-10 hover:-translate-y-1 hover:shadow-xl">
              <i class="fas fa-sign-in-alt mr-2"></i>
              Contact us
              <div class="absolute top-0 left-0 w-0 h-full bg-gradient-to-r from-indigo-100 to-indigo-200 transition-all duration-300 ease-in-out -z-10"></div>
            </a>
          </div>
        </div>

        <div class="w-full">
          <div class="bg-white rounded-lg shadow-md max-w-md w-full mx-auto">
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
        </div>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const container = document.getElementById('particles-container');
      for (let i = 0; i < 20; i++) {
        const particle = document.createElement('div');
        particle.classList.add('absolute', 'w-1.5', 'h-1.5', 'rounded-full', 'bg-white', 'bg-opacity-30');
        
        // Random positioning
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        
        // Random animation duration and delay
        const duration = 3 + Math.random() * 7;
        const delay = Math.random() * 5;
        
        particle.style.animation = `particleAnimation ${duration}s infinite ${delay}s`;
        
        container.appendChild(particle);
      }
    });
  </script>
</body>
</html>