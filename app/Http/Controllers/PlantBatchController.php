<?php

namespace App\Http\Controllers;

use App\Models\PlantBatch;
use Illuminate\Http\Request;
use App\Models\CareTemplate;
use App\Models\CareSchedule;
use Carbon\Carbon;

class PlantBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $plantBatches = PlantBatch::with([
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
            'plantTypes' => \App\Models\PlantType::where('status', 'active')->get(),
            'locations' => \App\Models\Location::where('status', 'active')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'plant_type_id' => 'required',
            'location_id' => 'required',
            'batch_code' => 'required|unique:plant_batches',
            'start_date' => 'required|date',
            'total_seed' => 'required|integer',
            'notes' => 'nullable',
        ]);

        $plantType = \App\Models\PlantType::findOrFail(
            $validated['plant_type_id']
        );

        $validated['estimated_harvest_date'] = Carbon::parse(
            $validated['start_date']
        )->addDays($plantType->estimated_harvest_days);

        $validated['created_by'] = auth()->id();

        // SIMPAN BATCH DULU
        $batch = PlantBatch::create($validated);

        // AUTO GENERATE SCHEDULE
        $templates = CareTemplate::where(
            'plant_type_id',
            $batch->plant_type_id
        )->get();

        foreach ($templates as $template) {

            CareSchedule::create([
                'plant_batch_id' => $batch->id,
                'care_template_id' => $template->id,

                'scheduled_date' => Carbon::parse($batch->start_date)
                    ->addDays($template->day_offset),

                'status' => 'pending',
            ]);
        }

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
        return view('plant-batches.edit', [
            'plantBatch' => $plantBatch,
            'plantTypes' => \App\Models\PlantType::all(),
            'locations' => \App\Models\Location::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlantBatch $plantBatch)
    {
        //
        $validated = $request->validate([
            'plant_type_id' => 'required',
            'location_id' => 'required',
            'batch_code' => 'required|unique:plant_batches,batch_code,' . $plantBatch->id,
            'start_date' => 'required|date',
            'total_seed' => 'required|integer',
            'notes' => 'nullable',
            'status' => 'required',
        ]);

        $plantType = \App\Models\PlantType::findOrFail(
            $validated['plant_type_id']
        );

        $validated['estimated_harvest_date'] = Carbon::parse(
            $validated['start_date']
        )->addDays($plantType->estimated_harvest_days);

        $plantBatch->update($validated);

        return redirect()
            ->route('plant-batches.index')
            ->with('success', 'Batch berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantBatch $plantBatch)
    {
        //
        $plantBatch->update([
            'status' => 'inactive',
        ]);

        return redirect()
            ->route('plant-batches.index')
            ->with('success', 'Batch berhasil dinonaktifkan');
    }

    public function activate(PlantBatch $plantBatch)
    {
        $plantBatch->update([
            'status' => 'active',
        ]);

        return redirect()
            ->route('plant-batches.index')
            ->with('success', 'Batch berhasil diaktifkan kembali');
    }
}
