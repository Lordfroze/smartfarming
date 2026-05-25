<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantBatchController;
use App\Http\Controllers\CareScheduleController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('plant-batches', PlantBatchController::class);
Route::resource('care-schedules', CareScheduleController::class);
Route::resource('activity-logs', ActivityLogController::class)
    ->only(['index']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::patch(
    'care-schedules/{careSchedule}/complete',
    [CareScheduleController::class, 'complete']
)->name('care-schedules.complete');

Route::patch(
    'plant-batches/{plantBatch}/activate',
    [PlantBatchController::class, 'activate']
)->name('plant-batches.activate');







require __DIR__ . '/auth.php';
