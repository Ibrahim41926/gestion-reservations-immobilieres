@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl p-10 shadow-lg mb-10">
        <h1 class="text-3xl md:text-4xl font-bold mb-3">Mon profil</h1>
        <p class="text-blue-100 text-base md:text-lg max-w-2xl">
            Gere tes informations personnelles et les parametres de ton compte.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="bg-white rounded-2xl shadow-md p-6 lg:col-span-1">
            <div class="flex flex-col items-center text-center">
                <div class="w-20 h-20 bg-blue-600 text-white flex items-center justify-center rounded-full text-2xl font-bold shadow-md">
                    {{ collect(explode(' ', auth()->user()->name))->map(fn($word) => strtoupper($word[0]))->join('') }}
                </div>

                <h2 class="mt-4 text-lg font-semibold text-gray-800">{{ auth()->user()->name }}</h2>
                <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>

                <span class="mt-3 inline-flex items-center rounded-full px-3 py-1 text-xs font-medium {{ auth()->user()->role === 'admin' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                    {{ auth()->user()->role === 'admin' ? 'Administrateur' : 'Client' }}
                </span>

                <p class="mt-4 text-xs text-gray-400">
                    Membre depuis {{ auth()->user()->created_at->format('d/m/Y') }}
                </p>
            </div>

            <div class="mt-6 border-t pt-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="block rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition">
                    Dashboard
                </a>
                <a href="{{ route('profile.edit') }}" class="block rounded-lg px-3 py-2 bg-blue-50 text-blue-700 font-medium">
                    Profil
                </a>
                <a href="{{ route('my.bookings') }}" class="block rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition">
                    Mes reservations
                </a>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Informations du compte</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="rounded-xl border p-4">
                        <p class="text-xs uppercase tracking-wide text-gray-500">Nom</p>
                        <p class="mt-1 font-medium text-gray-800">{{ auth()->user()->name }}</p>
                    </div>

                    <div class="rounded-xl border p-4">
                        <p class="text-xs uppercase tracking-wide text-gray-500">Email</p>
                        <p class="mt-1 font-medium text-gray-800">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Statistiques</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-blue-50 rounded-xl p-4">
                        <p class="text-sm text-gray-600">Reservations</p>
                        <p class="text-2xl font-bold text-blue-600">{{ auth()->user()->bookings()->count() }}</p>
                    </div>

                    <div class="bg-green-50 rounded-xl p-4">
                        <p class="text-sm text-gray-600">Statut</p>
                        <p class="text-lg font-semibold text-green-600">Actif</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Actions</h3>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <a href="{{ route('profile.edit.form') }}" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-2.5 text-white font-medium hover:bg-blue-700 transition">
                        Modifier le profil
                    </a>

                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Etes-vous sur ? Cette action est irreversible.')"
                            class="text-red-600 hover:text-red-800 transition text-sm font-medium"
                        >
                            Supprimer le compte
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
