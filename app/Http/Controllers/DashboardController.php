<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\CareSchedule;
use App\Models\Harvest;
use App\Models\PlantBatch;

class DashboardController extends Controller
{
    public function index()
    {
        $activeBatches = PlantBatch::where('status', 'active')->count();

        $pendingSchedules = CareSchedule::where('status', 'pending')->count();

        $totalActivities = ActivityLog::count();

        $totalHarvests = Harvest::count();

        $todaySchedules = CareSchedule::with([
            'plantBatch.plantType',
            'careTemplate',
        ])
            ->whereDate('scheduled_date', today())
            ->get();

        $latestActivities = ActivityLog::with([
            'plantBatch',
            'creator',
        ])
            ->latest('activity_date')
            ->take(5)
            ->get();

        return view('dashboard', [
            'activeBatches' => $activeBatches,
            'pendingSchedules' => $pendingSchedules,
            'totalActivities' => $totalActivities,
            'totalHarvests' => $totalHarvests,
            'todaySchedules' => $todaySchedules,
            'latestActivities' => $latestActivities,
        ]);
    }
}
