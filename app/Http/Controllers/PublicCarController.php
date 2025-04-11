<?php

namespace App\Http\Controllers;

use App\Services\CarAvailabilityService;

class PublicCarController extends Controller
{
    public function __construct(private CarAvailabilityService $service) {}

    public function available()
    {
        return response()->json($this->service->getAvailableCars());
    }
}
