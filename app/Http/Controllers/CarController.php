<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Support\Facades\Cache;

class CarController extends Controller
{
    public function index()
    {
        $cacheKey = 'available_cars';
        $cacheTime = now()->addMinutes(10);

        $cars = Cache::remember($cacheKey, $cacheTime, function () {
            return Car::with([
                'configurations' => function ($query) {
                    $query->with('prices');
                },
                'configurations.prices',
            ])->get();
        });

        return CarResource::collection($cars);
    }

    public function store(CarStoreRequest $request)
    {
        $car = Car::create($request->validated());
        return new CarResource($car);
    }

    public function show(Car $car)
    {
        return new CarResource($car);
    }

    public function update(CarUpdateRequest $request, Car $car)
    {
        $car->update($request->validated());
        return new CarResource($car);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return response()->noContent();
    }
}
