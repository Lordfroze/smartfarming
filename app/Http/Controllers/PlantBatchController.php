<?php

namespace App\Http\Controllers;

use App\Models\PlantBatch;
use Illuminate\Http\Request;

class PlantBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $plantBatches = \App\Models\PlantBatch::with([
            'plantType',
            'location',
        ])
            ->latest()
            ->get();

        return view('plant-batches.index', [
            'plantBatches' => $plantBatches,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('plant-batches.create', [
            'plantTypes' => \App\Models\PlantType::all(),
            'locations' => \App\Models\Location::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'plant_type_id' => 'required',
            'location_id' => 'required',
            'batch_code' => 'required|unique:plant_batches',
            'start_date' => 'required|date',
            'total_seed' => 'required|integer',
            'notes' => 'nullable',
        ]);

        $plantType = \App\Models\PlantType::findOrFail($validated['plant_type_id']);

        $validated['estimated_harvest_date'] = now()
            ->parse($validated['start_date'])
            ->addDays($plantType->estimated_harvest_days);

        $validated['created_by'] = auth()->id();

        \App\Models\PlantBatch::create($validated);

        return redirect()
            ->route('plant-batches.index')
            ->with('success', 'Batch tanaman berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(PlantBatch $plantBatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlantBatch $plantBatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlantBatch $plantBatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantBatch $plantBatch)
    {
        //
    }
}
