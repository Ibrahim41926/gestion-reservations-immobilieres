<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingManager extends Component
{
    public Property $property;
    public $start_date;
    public $end_date;

    public function mount(Property $property): void
    {
        $this->property = $property;
    }

public function book(): void
{
    $this->validate([
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ]);

    // 🔒 Vérifier s'il y a un chevauchement
    $conflict = Booking::where('property_id', $this->property->id)
        ->where(function ($query) {
            $query->where('start_date', '<=', $this->end_date)
                  ->where('end_date', '>=', $this->start_date);
        })
        ->exists();

    if ($conflict) {
        session()->flash('message', 'This property is already booked for these dates.');
        return;
    }

    Booking::create([
        'user_id' => Auth::id(),
        'property_id' => $this->property->id,
        'start_date' => $this->start_date,
        'end_date' => $this->end_date,
        'status' => 'pending',
    ]);

    session()->flash('message', 'Booking successful!');
    $this->dispatch('booking-created', propertyId: $this->property->id);

    $this->start_date = null;
    $this->end_date = null;
}

    public function render()
    {
        return view('livewire.booking-manager');
    }
}
