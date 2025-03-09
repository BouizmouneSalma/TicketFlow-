# 📌 TicketFlow - Gestion des Tickets et Affectation des Développeurs

## 📖 Description
TicketFlow est une application web permettant de gérer les tickets d’assistance et de signalement de bugs pour un logiciel spécifique. Les administrateurs peuvent assigner ces tickets aux développeurs, qui auront la responsabilité de les résoudre. Cette solution optimise la gestion des problèmes et améliore la communication entre les clients, les développeurs et les administrateurs.

## 🚀 Fonctionnalités

### 📦 Création et Gestion des Tickets
- Création de tickets avec :
  - Titre descriptif
  - Description détaillée
  - Priorité (Haute, Moyenne, Basse)
  - Système d’exploitation concerné
  - Logiciel concerné
  - Date de création
- Tri des tickets par priorité, logiciel ou statut
- Recherche par mots-clés

### 💬 Attribution et Suivi des Tickets
- Assignation des tickets aux développeurs par un administrateur
- Stockage des informations d’assignation (date et administrateur responsable)
- Mise à jour du statut des tickets :
  - En cours
  - Résolu
  - Fermé
- Tableau de bord permettant aux clients de suivre l’évolution de leurs tickets

### 📊 Statistiques et Analyse
- Nombre total de tickets créés, assignés et résolus
- Identification des logiciels avec le plus de demandes
- Classement des développeurs les plus actifs

### 🔐 Authentification & Rôles
- **Client** : Création et suivi des tickets
- **Développeur** : Consultation et résolution des tickets assignés
- **Administrateur** : Gestion des tickets et assignation aux développeurs

## 🛠️ Technologies Utilisées
- **PHP (Laravel)** : Framework pour le développement backend
- **PostgreSQL** : Base de données relationnelle
- **Blade** : Moteur de template pour les vues
- **Git** : Gestion de version
- **HTML/CSS/JavaScript** : Développement frontend
