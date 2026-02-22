#  Real Estate Booking System

Projet réalisé dans le cadre d’un test technique Laravel.

Application de gestion de réservations immobilières avec :

- Authentification
- Rôles (User / Admin)
- Réservation avec statut
- Interface utilisateur
- Panneau d’administration avec Filament

---

## 🚀 Stack Technique

- Laravel 12
- Livewire
- Filament v5
- TailwindCSS
- MySQL / SQLite

---

## 👥 Fonctionnalités

### 👤 Utilisateur

- Inscription / Connexion
- Consultation des propriétés
- Réservation d’une propriété
- Consultation de ses réservations
- Statut des réservations (pending, approved, cancelled)

### 👑 Administrateur

- Accès au panneau `/admin`
- Gestion des propriétés
- Gestion des réservations
- Modification du statut des réservations

---

## 🔐 Gestion des rôles

- Les utilisateurs normaux ne peuvent pas accéder au panneau admin.
- Les administrateurs sont redirigés automatiquement vers `/admin`.
- Les admins ne peuvent pas réserver.

---

## 🧪 Comptes de test
👑 Admin
Email: admin@test.com
Password: password

👤 User
Email: user@test.com
Password: password

## ⚙️ Installation

```bash
git clone <repo>
cd project
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve