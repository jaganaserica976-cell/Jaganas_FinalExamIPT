<?php

namespace App\Http\Controllers;

use App\Models\Campsite;
use Illuminate\Http\Request;

class CampsiteController extends Controller
{
    public function index()
    {
        $campsites = Campsite::all();

        return view('campsites.index', compact('campsites'));
    }

    public function create()
    {
        return view('campsites.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:Available,Unavailable',
        ]);

        Campsite::create($validated);

        return redirect()->route('campsites.index')
            ->with('success', 'Campsite added successfully!');
    }

    public function edit(string $id)
    {
        $campsite = Campsite::findOrFail($id);

        return view('campsites.edit', compact('campsite'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:Available,Unavailable',
        ]);

        $campsite = Campsite::findOrFail($id);
        $campsite->update($validated);

        return redirect()->route('campsites.index')
            ->with('success', 'Campsite updated successfully!');
    }

    public function destroy(string $id)
    {
        $campsite = Campsite::findOrFail($id);
        $campsite->delete();

        return redirect()->route('campsites.index')
            ->with('success', 'Campsite deleted successfully!');
    }
}