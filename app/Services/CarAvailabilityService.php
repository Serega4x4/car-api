<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\Car;

class CarAvailabilityService
{
    public function getAvailableCars(): array
    {
        return Cache::remember('available_cars', 600, function () {
            return Car::with([
                'configurations' => function ($query) {
                    $query->whereHas('currentPrice');
                },
                'configurations.options',
                'configurations.currentPrice',
            ])
                ->whereHas('configurations', function ($query) {
                    $query->whereHas('currentPrice');
                })
                ->get()
                ->map(function ($car) {
                    return [
                        'id' => $car->id,
                        'name' => $car->name,
                        'configurations' => $car->configurations
                            ->map(function ($conf) {
                                return [
                                    'id' => $conf->id,
                                    'name' => $conf->name,
                                    'options' => $conf->options->pluck('name'),
                                    'current_price' => $conf->currentPrice?->price,
                                ];
                            })
                            ->filter(fn($conf) => $conf['current_price'] !== null)
                            ->values(),
                    ];
                })
                ->filter(fn($car) => count($car['configurations']) > 0)
                ->values()
                ->toArray();
        });
    }
}
