<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use App\Models\PlantBatch;
use Illuminate\Http\Request;

class HarvestController extends Controller
{
    public function index()
    {
        $harvests = Harvest::with([
            'plantBatch.plantType',
            'creator',
        ])
            ->latest()
            ->get();

        return view('harvests.index', [
            'harvests' => $harvests,
        ]);
    }

    public function create()
    {
        return view('harvests.create', [
            'batches' => PlantBatch::where('status', 'active')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plant_batch_id' => 'required',
            'harvest_date' => 'required|date',
            'quantity' => 'required|numeric',
            'unit' => 'required',
            'quality_grade' => 'nullable',
            'notes' => 'nullable',
        ]);

        $validated['created_by'] = auth()->id();

        Harvest::create($validated);

        return redirect()
            ->route('harvests.index')
            ->with('success', 'Data panen berhasil ditambahkan');
    }

    public function edit(Harvest $harvest)
    {
        return view('harvests.edit', [
            'harvest' => $harvest,
            'batches' => PlantBatch::where('status', 'active')->get(),
        ]);
    }

    public function update(Request $request, Harvest $harvest)
    {
        $validated = $request->validate([
            'plant_batch_id' => 'required',
            'harvest_date' => 'required|date',
            'quantity' => 'required|numeric',
            'unit' => 'required',
            'quality_grade' => 'nullable',
            'notes' => 'nullable',
        ]);

        $harvest->update($validated);

        return redirect()
            ->route('harvests.index')
            ->with('success', 'Data panen berhasil diperbarui');
    }

    public function destroy(Harvest $harvest)
    {
        $harvest->delete();

        return redirect()
            ->route('harvests.index')
            ->with('success', 'Data panen berhasil dihapus');
    }
}
