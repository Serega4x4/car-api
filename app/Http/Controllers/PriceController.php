<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceStoreRequest;
use App\Http\Requests\PriceUpdateRequest;
use App\Models\Price;

class PriceController extends Controller
{
    public function index()
    {
        return Price::all();
    }

    public function store(PriceStoreRequest $request)
    {
        $validated = $request->validate();
        return Price::create($validated);
    }

    public function show($id)
    {
        return Price::findOrFail($id);
    }

    public function update(PriceUpdateRequest $request, $id)
    {
        $validated = $request->validate([
            
        ]);
        $price = Price::findOrFail($id);
        $price->update($validated);
        return $price;
    }

    public function destroy($id)
    {
        Price::destroy($id);
        return response()->noContent();
    }
}
