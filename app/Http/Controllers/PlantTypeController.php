<?php

namespace App\Http\Controllers;

use App\Models\PlantType;
use Illuminate\Http\Request;

class PlantTypeController extends Controller
{
    public function index()
    {
        $plantTypes = PlantType::latest()->get();

        return view('plant-types.index', [
            'plantTypes' => $plantTypes,
        ]);
    }

    public function create()
    {
        return view('plant-types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'nullable',
            'description' => 'nullable',
            'estimated_harvest_days' => 'required|integer',
        ]);

        PlantType::create($validated);

        return redirect()
            ->route('plant-types.index')
            ->with('success', 'Jenis tanaman berhasil ditambahkan');
    }

    public function edit(PlantType $plantType)
    {
        return view('plant-types.edit', [
            'plantType' => $plantType,
        ]);
    }

    public function update(Request $request, PlantType $plantType)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'nullable',
            'description' => 'nullable',
            'estimated_harvest_days' => 'required|integer',
        ]);

        $plantType->update($validated);

        return redirect()
            ->route('plant-types.index')
            ->with('success', 'Jenis tanaman berhasil diperbarui');
    }

    public function destroy(PlantType $plantType)
    {
        $plantType->delete();

        return redirect()
            ->route('plant-types.index')
            ->with('success', 'Jenis tanaman berhasil dihapus');
    }
}
