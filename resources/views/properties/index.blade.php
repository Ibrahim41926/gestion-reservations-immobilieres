@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10">
    
    <h1 class="text-3xl font-bold mb-8 text-center">
        Available Properties
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        @forelse ($properties as $property)
            <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
                
                <h2 class="text-xl font-semibold mb-3">
                    {{ $property->name }}
                </h2>

                <p class="text-gray-600 mb-4">
                    {{ $property->description }}
                </p>

                <p class="text-primary font-bold text-lg mb-4">
                    ${{ $property->price_per_night }} / night
                </p>

                {{-- Appel Livewire CORRECT --}}
                <livewire:booking-manager :property="$property" :key="'property-'.$property->id" />

            </div>
        @empty
            <p class="text-center col-span-3">
                No properties available.
            </p>
        @endforelse

    </div>
</div>
@endsection
