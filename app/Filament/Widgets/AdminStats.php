<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Booking;
use App\Models\Property;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Utilisateurs', User::count())
                ->description('Total des comptes')
                ->color('primary'),

            Stat::make('Réservations', Booking::count())
                ->description('Toutes réservations')
                ->color('success'),

            Stat::make('Propriétés', Property::count())
                ->description('Biens enregistrés')
                ->color('warning'),

            Stat::make('Réservations actives', 
                Booking::where('end_date', '>=', now())->count()
            )
                ->description('En cours')
                ->color('danger'),

        ];
    }
}