<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionStoreRequest;
use App\Http\Requests\OptionUpdateRequest;
use App\Models\Option;

class OptionController extends Controller
{
    public function index()
    {
        return Option::all();
    }

    public function store(OptionStoreRequest $request)
    {
        $validated = $request->validate();
        return Option::create($validated);
    }

    public function show($id)
    {
        return Option::findOrFail($id);
    }

    public function update(OptionUpdateRequest $request, $id)
    {
        $validated = $request->validate();
        $option = Option::findOrFail($id);
        $option->update($validated);
        return $option;
    }

    public function destroy($id)
    {
        Option::destroy($id);
        return response()->noContent();
    }
}
