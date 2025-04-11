<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        return Option::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        return Option::create($validated);
    }

    public function show($id)
    {
        return Option::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
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
