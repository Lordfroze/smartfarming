<?php

namespace App\Http\Controllers;

use App\Models\CareSchedule;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class CareScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = CareSchedule::with([
            'plantBatch.plantType',
            'careTemplate',
        ])
            ->orderBy('scheduled_date')
            ->get();

        return view('care-schedules.index', [
            'schedules' => $schedules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CareSchedule $careSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareSchedule $careSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CareSchedule $careSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareSchedule $careSchedule)
    {
        //
    }

    public function complete(CareSchedule $careSchedule)
    {
        $careSchedule->update([
            'status' => 'completed',
        ]);

        ActivityLog::create([

            'plant_batch_id' => $careSchedule->plant_batch_id,

            'care_schedule_id' => $careSchedule->id,

            'activity_type' => $careSchedule
                ->careTemplate
                ->activity_type,

            'activity_date' => now(),

            'title' => $careSchedule
                ->careTemplate
                ->title,

            'notes' => $careSchedule
                ->careTemplate
                ->description,

            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Jadwal berhasil diselesaikan');
    }
}
