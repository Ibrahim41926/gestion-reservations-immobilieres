# Real Estate Booking System

Projet realise dans le cadre d'un test technique Laravel.

Application de gestion de reservations immobilieres avec separation claire entre espace client et administration.

## Stack Technique

- Laravel 12
- Livewire
- Filament v5
- TailwindCSS
- MySQL / SQLite

## Fonctionnalites

### Cote Client

- Inscription, connexion, deconnexion
- Verification d'email pour l'acces aux pages protegées
- Consultation des proprietés
- Reservation d'une proprieté via composant Livewire
- Prevention des chevauchements de reservations sur une meme propriete
- Consultation de ses reservations (`/my-bookings`)
- Gestion du profil: modification des informations et suppression du compte

### Cote Admin (Filament `/admin`)

- Dashboard avec widget de statistiques:
  - total utilisateurs
  - total reservations
  - total proprietés
  - reservations actives
- Gestion CRUD des proprietes
- Gestion des utilisateurs (nom, email, role, mot de passe)
- Gestion des reservations existantes:
  - consultation
  - modification du statut (`pending`, `approved`, `cancelled`)
  - edition / suppression

## Gestion des roles et acces

- Role par defaut: `client`
- Les admins sont rediriges automatiquement vers `/admin` apres connexion
- Les clients n'ont pas acces au panel admin
- Les admins n'ont pas acces aux routes client de reservation

## Routes principales

- `/` page d'accueil
- `/dashboard` espace client (auth + email verifie)
- `/properties` liste des proprietes
- `/my-bookings` reservations de l'utilisateur connecte
- `/profile` page profil
- `/admin` panneau d'administration Filament

## Installation

```bash
git clone <repo>
cd <repo>
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
npm run dev
```

## Notes utiles

- Le seeder par defaut cree un utilisateur test: `test@example.com`
- Pour creer un admin rapidement:

```bash
php artisan tinker
```

Puis:

```php
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@site.com',
    'password' => 'password123',
    'role' => 'admin',
]);
```
