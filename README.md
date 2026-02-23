# Real Estate Booking System

Application Laravel de gestion de reservations immobilieres avec un espace client et un panneau d'administration Filament.

## Presentation du projet

Ce projet permet a un utilisateur de:
- consulter des proprietes,
- effectuer des reservations,
- suivre ses reservations,
- gerer son profil.

Un administrateur peut gerer les donnees metier depuis Filament (utilisateurs, proprietes, reservations) avec des statistiques globales.

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
- Verification email pour l'acces aux pages protegees
- Liste des proprietes disponibles
- Reservation d'une propriete via Livewire
- Prevention des chevauchements de reservations
- Consultation des reservations personnelles
- Mise a jour du profil et suppression du compte

### Cote admin
- Acces au panel `/admin` (role admin uniquement)
- Dashboard avec statistiques (utilisateurs, proprietes, reservations)
- CRUD proprietes
- Gestion des utilisateurs et des roles
- Gestion des reservations (edition, statut, suppression)
- Creation de reservation admin desactivee

## Apercu de l'application

### Dashboard utilisateur
Vue d'ensemble de l'espace client apres connexion, avec acces rapide aux actions principales.

<p align="center">
  <img src="Screenshoots/TAbleau%20de%20bord%20cot%C3%A9%20Client.jpg" alt="Dashboard utilisateur" width="700" />
</p>

### Page Profil
Page de consultation du profil utilisateur et acces aux actions de mise a jour.

<p align="center">
  <img src="Screenshoots/Page%20profile.jpg" alt="Page Profil" width="700" />
</p>

### Liste des proprietes
Liste des biens disponibles avec leurs informations principales.

<p align="center">
  <img src="Screenshoots/Page%20propreties.jpg" alt="Liste des proprietes" width="700" />
</p>

### Page reservations
Vue des reservations de l'utilisateur (statut, periode, details associes).

<p align="center">
  <img src="Screenshoots/PAge%20mes%20reservations.jpg" alt="Page reservations" width="700" />
</p>

### Panneau admin
Dashboard Filament pour le pilotage global de l'application.

<p align="center">
  <img src="Screenshoots/Tableau%20de%20Bord%20Admin(Filament).jpg" alt="Panneau admin Filament" width="700" />
</p>

## Legende des captures

- `Screenshoots/TAbleau de bord coté Client.jpg` : dashboard de l'utilisateur connecte.
- `Screenshoots/Page profile.jpg` : page profil utilisateur.
- `Screenshoots/Page propreties.jpg` : catalogue des proprietes.
- `Screenshoots/PAge mes reservations.jpg` : reservations de l'utilisateur.
- `Screenshoots/Tableau de Bord Admin(Filament).jpg` : panneau admin Filament.

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
