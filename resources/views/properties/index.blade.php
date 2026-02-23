@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl p-10 shadow-lg mb-10">
        <h1 class="text-3xl md:text-4xl font-bold mb-3">
            Proprietés disponibles
        </h1>
        <p class="text-blue-100 text-base md:text-lg max-w-2xl">
            Decouvre une selection de biens et reserve en quelques clics.
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Resumé</h2>
        <p class="text-gray-600">
            <span class="font-semibold text-blue-600">{{ $properties->count() }}</span>
            proprietés{{ $properties->count() > 1 ? 's' : '' }} disponible{{ $properties->count() > 1 ? 's' : '' }}.
        </p>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Catalogue</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse ($properties as $property)
                <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        {{ $property->name }}
                    </h3>

                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $property->description }}
                    </p>

                    <p class="text-blue-600 font-bold text-lg mb-5">
                        ${{ number_format((float) $property->price_per_night, 2) }} / nuit
                    </p>

                    <livewire:booking-manager :property="$property" :key="'property-'.$property->id" />
                </div>
            @empty
                <div class="bg-white rounded-2xl shadow-md p-8 text-center text-gray-600 md:col-span-2 xl:col-span-3">
                    Aucune proprieté disponible pour le moment.
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
