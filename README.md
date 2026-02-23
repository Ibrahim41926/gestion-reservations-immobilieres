# Test Technique

Application Laravel de gestion de reservations immobilieres avec un espace client et un panneau d'administration Filament.

## Presentation du projet

Ce projet permet a un utilisateur de:
- consulter des proprietés,
- effectuer des reservations,
- suivre ses reservations,
- gerer son profil.

Un administrateur peut gerer les données metier depuis Filament (utilisateurs, proprietes, reservations) avec des statistiques globales.

## Stack technique

- Laravel 12
- PHP 8.3+
- Livewire
- Filament v5
- Tailwind CSS
- MySQL / SQLite

## Fonctionnalites principales

### Cote client
- Authentification (inscription, connexion, deconnexion)
- Verification email pour l'acces aux pages protegées
- Liste des proprietes disponibles
- Reservation d'une proprieté via Livewire
- Prevention des chevauchements de reservations
- Consultation des reservations personnelles
- Mise a jour du profil et suppression du compte

### Cote admin
- Acces au panel `/admin` (role admin uniquement)
- Dashboard avec statistiques (utilisateurs, proprietés, reservations)
- CRUD proprietés
- Gestion des utilisateurs et des roles
- Gestion des reservations (edition, statut, suppression)
- Creation de reservation admin desactivée

## Apercu de l'application

### 1) Dashboard utilisateur
Vue d'ensemble de l'espace client apres connexion, avec acces rapide aux actions principales.

<p align="center">
  <img src="Screenshoots/TAbleau%20de%20bord%20cot%C3%A9%20Client.jpg" alt="Dashboard utilisateur" width="700" />
</p>

### 2) Page de connexion cote client
Ecran de connexion pour les utilisateurs non admin.

<p align="center">
  <img src="Screenshoots/Page%20de%20connexion%20cot%C3%A9%20client.jpg" alt="Connexion client" width="700" />
</p>

### 3) Page Profil
Page principale du profil utilisateur.

<p align="center">
  <img src="Screenshoots/Page%20profile.jpg" alt="Page Profil" width="700" />
</p>

### 4) Formulaire de modification du profil
Formulaire dedié a la mise a jour des informations du compte.

<p align="center">
  <img src="Screenshoots/Pae%20Modifier%20Profil.jpg" alt="Modifier profil" width="700" />
</p>

### 5) Liste des proprietes (client)
Catalogue des proprietés disponibles cote client.

<p align="center">
  <img src="Screenshoots/Page%20propreties.jpg" alt="Liste des proprietes client" width="700" />
</p>

### 6) Page reservations (client)
Vue des reservations de l'utilisateur connecté.

<p align="center">
  <img src="Screenshoots/PAge%20mes%20reservations.jpg" alt="Reservations client" width="700" />
</p>

### 7) Dashboard admin (Filament)
Tableau de bord global avec les indicateurs principaux.

<p align="center">
  <img src="Screenshoots/Tableau%20de%20Bord%20Admin(Filament).jpg" alt="Dashboard admin Filament" width="700" />
</p>

### 8) Gestion des utilisateurs (admin)
Ecran de gestion des comptes utilisateurs et roles.

<p align="center">
  <img src="Screenshoots/Gestion%20Utilisateur.jpg" alt="Gestion utilisateurs admin" width="700" />
</p>

### 9) Liste des proprietes (admin)
Gestion des proprietés depuis l'interface admin.

<p align="center">
  <img src="Screenshoots/Page%20propreties%20cot%C3%A9%20Admin.jpg" alt="Proprietes admin" width="700" />
</p>

### 10) Creation d'une propriete (admin)
Formulaire de creation d'un nouveau bien immobilier.

<p align="center">
  <img src="Screenshoots/Page%20creer%20une%20propriet%C3%A9.jpg" alt="Creation propriete admin" width="700" />
</p>

### 11) Gestion des reservations (admin)
Liste et suivi des reservations coté administration.

<p align="center">
  <img src="Screenshoots/Page%20reservation%20cot%C3%A9%20Admin.jpg" alt="Reservations admin" width="700" />
</p>


## Installation

```bash
git clone <repo-url>
cd <repo>
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
npm run dev
```

## Comptes de test

### Compte client (seed par defaut)
- Email: `test@example.com`
- Mot de passe: `password`

### Compte admin
Aucun compte admin n'est seed par defaut. Creez-en un via Tinker:

```bash
php artisan tinker
```

```php
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@site.com',
    'password' => 'password123',
    'role' => 'admin',
]);
```

## Auteur

Souleymane Diallo
