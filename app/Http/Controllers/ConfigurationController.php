<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigurationStoreRequest;
use App\Http\Requests\ConfigurationUpdateRequest;
use App\Models\Configuration;

class ConfigurationController extends Controller
{
    public function index()
    {
        return Configuration::all();
    }

    public function store(ConfigurationStoreRequest $request)
    {
        $validated = $request->validate();
        return Configuration::create($validated);
    }

    public function show($id)
    {
        return Configuration::findOrFail($id);
    }

    public function update(ConfigurationUpdateRequest $request, $id)
    {
        $validated = $request->validate();
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
