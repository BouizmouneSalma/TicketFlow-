# 🎟️ Gestion des Tickets

## 📌 Description du Projet

Ce projet est une plateforme de gestion des tickets permettant aux clients de signaler des problèmes ou de demander une assistance. Il intègre un système d'authentification avec différents rôles (Client, Développeur, Administrateur) et propose des fonctionnalités avancées de suivi, de statistiques et de notifications.

## 🚀 Fonctionnalités

### 📦 Création et Gestion des Tickets
- Création de tickets avec :
  - Un titre descriptif
  - Une description détaillée
  - Une priorité (Haute, Moyenne, Basse)
  - Le système d’exploitation concerné
  - Le logiciel concerné
  - La date de création
- Tri des tickets par priorité, logiciel ou statut
- Recherche de tickets par mots-clés

### 💬 Attribution et Suivi des Tickets
- Assignation des tickets par un administrateur à un développeur
- Suivi de l’évolution du ticket avec les statuts :
  - En cours
  - Résolu
  - Fermé
- Suivi des tickets via un tableau de bord utilisateur

### 📊 Statistiques et Analyse
- Nombre total de tickets créés, assignés et résolus
- Identification des logiciels avec le plus de demandes
- Classement des développeurs les plus actifs

### 🔐 Authentification & Rôles
- **Client** : Peut créer des tickets et suivre leur état
- **Développeur** : Peut voir et résoudre les tickets assignés
- **Administrateur** : Peut assigner des tickets et superviser l'activité
- Authentification via email et mot de passe

### ⭐ Bonus
- 📌 **Notifications** : Alertes en cas de changement de statut d’un ticket
- 🔍 **Filtrage avancé** : Tri selon plusieurs critères (priorité, date, état, logiciel)
- 📊 **Tableau de bord interactif** : Vue personnalisée pour chaque utilisateur

## 🛠️ Technologies utilisées
- **Backend** : Laravel (PHP)
- **Base de données** : PostgreSQL
- **Template Engine** : Blade
- **Frontend** : HTML, CSS, Tailwind, JavaScript
- **ORM** : Eloquent

## 📦 Installation et Configuration
### Prérequis
- PHP 8+
- Composer
- PostgreSQL
- Node.js & NPM

### Étapes d’installation
1. **Cloner le projet**
   ```bash
   git clone https://github.com/votre-utilisateur/votre-repo.git
   cd votre-repo
   ```
2. **Installer les dépendances**
   ```bash
   composer install
   npm install && npm run build
   ```
3. **Configurer l’environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   - Modifier `.env` avec les informations de votre base de données
4. **Exécuter les migrations**
   ```bash
   php artisan migrate --seed
   ```
5. **Lancer le serveur**
   ```bash
   php artisan serve
   ```

## 📜 Licence
Ce projet est sous licence MIT.

## 🤝 Contribuer
Les contributions sont les bienvenues ! Pour proposer une amélioration :
1. Forker le dépôt
2. Créer une branche (`feature-nouvelle-fonctionnalite`)
3. Committer vos modifications (`git commit -m 'Ajout d'une nouvelle fonctionnalité'`)
4. Pousser la branche (`git push origin feature-nouvelle-fonctionnalite`)
5. Ouvrir une Pull Request

---

✨ _Développé avec passion ❤️_

