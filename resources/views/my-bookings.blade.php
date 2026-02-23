@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl p-10 shadow-lg mb-10">
        <h1 class="text-3xl md:text-4xl font-bold mb-3">
            Mes reservations
        </h1>
        <p class="text-blue-100 text-base md:text-lg max-w-2xl">
            Consulte l'historique de tes sejours et le details de tes reservations en un seul endroit.
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Resume</h2>
        <p class="text-gray-600">
            Tu as <span class="font-semibold text-blue-600">{{ $bookings->count() }}</span>
            reservation{{ $bookings->count() > 1 ? 's' : '' }} enregistrée{{ $bookings->count() > 1 ? 's' : '' }}.
        </p>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Liste des reservations</h2>

        @forelse ($bookings as $booking)
            <div class="bg-white rounded-2xl shadow-md p-6 mb-4 hover:shadow-xl transition">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $booking->property->name ?? 'Propriete indisponible' }}
                        </h3>
                        <p class="text-gray-600 mt-1">
                            Du <span class="font-medium">{{ \Illuminate\Support\Carbon::parse($booking->start_date)->format('d/m/Y') }}</span>
                            au <span class="font-medium">{{ \Illuminate\Support\Carbon::parse($booking->end_date)->format('d/m/Y') }}</span>
                        </p>
                    </div>

                    <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700 w-fit">
                        Reservation active
                    </span>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl shadow-md p-8 text-center text-gray-600">
                Aucune reservation trouvée pour le moment.
            </div>
        @endforelse
    </div>

</div>
@endsection
