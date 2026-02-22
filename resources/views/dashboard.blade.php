@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-8 text-center">
        Bienvenue, {{ auth()->user()->name }}
    </h1>

    {{-- Si ADMIN --}}
    @if(auth()->user()->is_admin)

        <div class="flex justify-center">
            <a href="/admin"
               class="bg-purple-600 text-white shadow-lg rounded-xl p-8 hover:bg-purple-700 transition text-center w-96">

                <h2 class="text-2xl font-semibold mb-3">
                    Panneau d'administration
                </h2>

                <p>
                    Gérer les propriétés et les réservations
                </p>

            </a>
        </div>

    {{-- Si USER normal --}}
    @else

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <a href="{{ route('properties.index') }}"
               class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition text-center">

                <h2 class="text-xl font-semibold mb-2">
                    Afficher les propriétés
                </h2>

                <p class="text-gray-600">
                    Consulter les propriétés disponibles
                </p>
            </a>

            <a href="{{ route('my.bookings') }}"
               class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition text-center">

                <h2 class="text-xl font-semibold mb-2">
                    Mes réservations
                </h2>

                <p class="text-gray-600">
                    Consulter vos réservations
                </p>
            </a>

        </div>

    @endif

</div>
@endsection