<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    protected $fillable = [
    'name',
    'description',
    'price_per_night'
];
}