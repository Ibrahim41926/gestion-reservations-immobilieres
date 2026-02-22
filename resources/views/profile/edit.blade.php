@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex justify-center pt-16">

    <div class="w-full max-w-5xl flex gap-8">

        {{-- SIDEBAR --}}
        <div class="w-64 bg-white rounded-2xl shadow-lg p-6 h-fit">

            <div class="flex flex-col items-center text-center">

                <div class="w-20 h-20 bg-blue-600 text-white flex items-center justify-center rounded-full text-2xl font-bold shadow-md">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <h2 class="mt-4 font-semibold">
                    {{ auth()->user()->name }}
                </h2>

                <p class="text-sm text-gray-500">
                    {{ auth()->user()->email }}
                </p>

                <span class="mt-3 px-3 py-1 text-xs rounded-full 
                    {{ auth()->user()->is_admin ? 'bg-purple-100 text-purple-600' : 'bg-green-100 text-green-600' }}">
                    {{ auth()->user()->is_admin ? 'Administrateur' : 'Utilisateur' }}
                </span>

                <p class="mt-4 text-xs text-gray-400">
                    Membre depuis {{ auth()->user()->created_at->format('d M Y') }}
                </p>

            </div>

            <div class="mt-6 border-t pt-4 space-y-3">

                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                    🏠 Dashboard
                </a>

                <a href="{{ route('profile.edit') }}"
                   class="flex items-center gap-2 text-blue-600 font-medium">
                    👤 Profil
                </a>

                <a href="{{ route('my.bookings') }}"
                   class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                    📅 Mes réservations
                </a>

            </div>

        </div>

        {{-- MAIN CONTENT --}}
        <div class="flex-1 bg-white rounded-2xl shadow-lg p-8">

            <h1 class="text-2xl font-bold mb-6">
                Informations du compte
            </h1>

            {{-- Stats --}}
            <div class="grid grid-cols-2 gap-6 mb-8">

                <div class="bg-blue-50 rounded-xl p-4 hover:shadow-md transition">
                    <p class="text-sm text-gray-500">Réservations</p>
                    <p class="text-2xl font-bold text-blue-600">
                        {{ auth()->user()->bookings()->count() }}
                    </p>
                </div>

                <div class="bg-green-50 rounded-xl p-4 hover:shadow-md transition">
                    <p class="text-sm text-gray-500">Statut</p>
                    <p class="text-lg font-semibold text-green-600">
                        Actif
                    </p>
                </div>

            </div>

            {{-- Infos --}}
            <div class="space-y-4">

                <div class="border rounded-xl p-4 hover:shadow-sm transition">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Nom</p>
                    <p class="font-medium mt-1">{{ auth()->user()->name }}</p>
                </div>

                <div class="border rounded-xl p-4 hover:shadow-sm transition">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Email</p>
                    <p class="font-medium mt-1">{{ auth()->user()->email }}</p>
                </div>

            </div>

            {{-- Actions --}}
            <div class="mt-8 flex justify-between items-center">

                <a href="{{ route('profile.edit.form') }}"
                   class="bg-blue-600 text-gray px-6 py-2 rounded-lg font-medium hover:bg-blue-700 hover:scale-105 transition duration-200">
                    Modifier le profil
                </a>

                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Êtes-vous sûr ? Cette action est irréversible.')"
                            class="text-red-600 hover:text-red-800 transition text-sm">
                        Supprimer le compte
                    </button>
                </form>

            </div>

        </div>

    </div>

</div>
@endsection