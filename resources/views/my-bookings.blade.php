@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-8 text-center">
        My Reservations
    </h1>

    @forelse ($bookings as $booking)
        <div class="bg-white shadow rounded-lg p-6 mb-4">
            <h2 class="font-semibold">
                {{ $booking->property->name }}
            </h2>
            <p>
                From {{ $booking->start_date }} to {{ $booking->end_date }}
            </p>
        </div>
    @empty
        <p>No bookings found.</p>
    @endforelse

</div>
@endsection