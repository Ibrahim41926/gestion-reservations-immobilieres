<div class="bg-white shadow-lg rounded-xl p-6 mt-6">

    <h2 class="text-xl font-semibold mb-4">
        Réservez la {{ $property->name }}
    </h2>

    @if (session()->has('message'))
    <div class="p-3 rounded mb-4 
        {{ str_contains(session('message'), 'already') 
            ? 'bg-red-100 text-red-700' 
            : 'bg-green-100 text-green-700' }}">
        {{ session('message') }}
    </div>
@endif

    <div class="mb-4">
        <label>Date de début</label>
        <input type="date" wire:model="start_date" class="w-full border rounded p-2">
        @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label>Date de fin</label>
        <input type="date" wire:model="end_date" class="w-full border rounded p-2">
        @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <button
        wire:click="book"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
>
        Confirm Booking
    </button>

</div>