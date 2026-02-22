@extends('layouts.app')

@section('content')

{{-- HERO --}}
<div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl p-12 shadow-lg mb-12">
    <h1 class="text-4xl font-bold mb-4">
        Bienvenue, {{ auth()->user()->name }}
    </h1>

    <p class="text-blue-100 max-w-2xl text-lg">
        Réservez facilement des propriétés exclusives partout dans le monde.
        Simple, rapide et sécurisé.
    </p>
</div>

{{-- QUI SOMMES NOUS --}}
<div class="bg-white rounded-2xl shadow-md p-10 mb-12">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">
        Qui sommes-nous ?
    </h2>

    <p class="text-gray-600 leading-relaxed">
        Nous sommes une plateforme spécialisée dans la gestion et la réservation
        de biens immobiliers. Notre mission est de simplifier l'expérience
        de location pour les utilisateurs et les propriétaires.
        Notre système permet une gestion fluide, rapide et sécurisée.
    </p>
</div>

{{-- PROPRIÉTÉS DISPONIBLES --}}
<div>
    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        Propriétés disponibles
    </h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

        @foreach(\App\Models\Property::latest()->take(4)->get() as $property)
            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <h3 class="text-lg font-semibold text-gray-800">
                    {{ $property->name }}
                </h3>

                <p class="text-gray-500 mt-2 text-sm line-clamp-3">
                    {{ $property->description }}
                </p>

                <p class="text-blue-600 font-bold mt-4 text-lg">
                    {{ $property->price }} $ / nuit
                </p>
            </div>
        @endforeach

    </div>

    <div class="mt-8">
        <a href="{{ url('/properties') }}"
           class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            Voir toutes les propriétés
        </a>
    </div>
</div>

@endsection