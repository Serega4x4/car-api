<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        return Configuration::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'name' => 'required|string|max:255',
        ]);
        return Configuration::create($validated);
    }

    public function show($id)
    {
        return Configuration::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'name' => 'required|string|max:255',
        ]);
        $configuration = Configuration::findOrFail($id);
        $configuration->update($validated);
        return $configuration;
    }

    public function destroy($id)
    {
        Configuration::destroy($id);
        return response()->noContent();
    }
}
