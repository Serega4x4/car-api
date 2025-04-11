<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        return Price::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'configuration_id' => 'required|exists:configurations,id',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);
        return Price::create($validated);
    }

    public function show($id)
    {
        return Price::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'configuration_id' => 'required|exists:configurations,id',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
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
