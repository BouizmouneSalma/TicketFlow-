
<script src="{{ asset('assets/js/auth.js') }}"></script>  

<div id="ticketModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50 hidden">
    <form  class="bg-white rounded-lg w-full max-w-[60rem] sm:max-w-3/4 md:max-w-2/3 p-4 sm:p-6 shadow-lg overflow-y-auto" method='POST'  action="{{ route('Support.addTicket') }}" enctype="multipart/form-data" >
        @csrf
      <div class="flex justify-between items-center mb-4 sm:mb-6">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Créer un nouveau ticket</h2>
        <button  onclick="toggleModal(false)" class="text-gray-500 hover:text-gray-700 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
  
      <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
        <!-- Left Side Inputs -->
        <div class="w-full max-w-[50rem] sm:w-2/3 space-y-4">
        <div class="flex flex-col">
            
            <label for="Titre" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
            <input type="text" id="title" name="Titre_Article" class="mt-2 p-2 sm:p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required  placeholder="Titre descriptif du problème">
          </div>
          <div class="flex flex-col">
            <label for="Description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" required placeholder="Décrivez le problème en détail..."></textarea>
            </div>
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
   
        </div>
  
        <div class="w-full sm:w-1/3 bg-gray-100 rounded-lg p-4 space-y-4">
            <div>
                <label for="attachment" class="block text-sm font-medium text-gray-700 mb-1">Pièce jointe (Optionnel)</label>
                <div class="flex items-center space-x-2">
                  <label class="flex items-center px-4 py-2 bg-white text-indigo-600 rounded-md border border-indigo-300 cursor-pointer hover:bg-indigo-50 w-full sm:w-64">
                    <i class="fas fa-paperclip mr-2"></i>
                    <span>Choisir un fichier</span>
                    <input type="file" id="attachment" name="atached_file" class="hidden">
                  </label>
                </div>
                <p class="text-xs text-gray-500 mt-1">Max 5MB. Formats acceptés: PDF, JPG, PNG</p>
            </div>

          <div>
            <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">Priorité*</label>
            <select id="priority" name="ticket_priorityc" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
              <option value="">Sélectionnez une priorité</option>
              <option value="Haute">Haute</option>
              <option value="Moyenne">Moyenne</option>
              <option value="Basse">Basse</option>
            </select>
          </div>
          <div>
            <label for="softwareId" class="block text-sm font-medium text-gray-700 mb-1">Logiciel concerné*</label>
            <select id="softwareId" name="Logiciel" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
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

    
  
       
          <div>
            <label for="os" class="block text-sm font-medium text-gray-700 mb-1">Système d'exploitation*</label>
            <select id="os" name="os" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
              <option value="">Sélectionnez un OS</option>
              <option value="Windows">Windows</option>
              <option value="MacOS">MacOS</option>
              <option value="Linux">Linux</option>
              <option value="Autre">Autre</option>
            </select>
          </div>
  
       
        </div>
      </div>
  
      <div class="mt-6 sm:mt-8 flex justify-between space-y-4 sm:space-y-0 sm:flex-row">
        <button onclick="toggleModal(false)" class="bg-red-500 text-white py-2 sm:py-3 px-6 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Annuler</button>
        <button type="submit" name="validateForm"  class="bg-green-600 text-white py-2 sm:py-3 px-6 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Valider</button>
      </div>
    </form>
  </div>

