<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Farming Dashboard</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-7xl mx-auto p-6">

        {{-- HEADER --}}
        <div class="mb-8">

            <h1 class="text-4xl font-bold text-gray-800">
                Smart Farming Dashboard 🌱
            </h1>

            <p class="text-gray-500 mt-2">
                Monitoring tanaman dan aktivitas pertanian
            </p>
            <div class="flex flex-wrap gap-3 mt-6">

                <a href="{{ route('plant-batches.index') }}"
                    class="bg-green-600 hover:bg-green-700
              text-white px-4 py-2 rounded-xl shadow">

                    🌱 Plant Batches

                </a>

                <a href="{{ route('care-schedules.index') }}"
                    class="bg-yellow-500 hover:bg-yellow-600
              text-white px-4 py-2 rounded-xl shadow">

                    📅 Care Schedules

                </a>

                <a href="{{ route('activity-logs.index') }}"
                    class="bg-blue-600 hover:bg-blue-700
              text-white px-4 py-2 rounded-xl shadow">

                    📝 Activity Logs

                </a>

                <a href="{{ route('plant-batches.create') }}"
                    class="bg-purple-600 hover:bg-purple-700
              text-white px-4 py-2 rounded-xl shadow">

                    ➕ Tambah Batch

                </a>

            </div>
        </div>

        {{-- STATS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-gray-500 text-sm">
                    Batch Aktif
                </p>

                <h2 class="text-4xl font-bold text-green-600 mt-2">
                    {{ $activeBatches }}
                </h2>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-gray-500 text-sm">
                    Jadwal Pending
                </p>

                <h2 class="text-4xl font-bold text-yellow-500 mt-2">
                    {{ $pendingSchedules }}
                </h2>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-gray-500 text-sm">
                    Total Aktivitas
                </p>

                <h2 class="text-4xl font-bold text-blue-500 mt-2">
                    {{ $totalActivities }}
                </h2>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-gray-500 text-sm">
                    Total Panen
                </p>

                <h2 class="text-4xl font-bold text-purple-500 mt-2">
                    {{ $totalHarvests }}
                </h2>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- TODAY SCHEDULE --}}
            <div class="bg-white rounded-2xl shadow">

                <div class="p-6 border-b">
                    <h2 class="text-xl font-bold text-gray-800">
                        Jadwal Hari Ini
                    </h2>
                </div>

                <div class="p-6">

                    @forelse($todaySchedules as $schedule)

                    <div class="border rounded-xl p-4 mb-4">

                        <div class="flex items-center justify-between">

                            <div>
                                <h3 class="font-semibold text-gray-800">
                                    {{ $schedule->careTemplate->title }}
                                </h3>

                                <p class="text-sm text-gray-500">
                                    {{ $schedule->plantBatch->batch_code }}
                                    -
                                    {{ $schedule->plantBatch->plantType->name }}
                                </p>
                            </div>

                            <span class="bg-yellow-100 text-yellow-700
                                         text-xs px-3 py-1 rounded-full">

                                {{ ucfirst($schedule->status) }}

                            </span>

                        </div>

                    </div>

                    @empty

                    <p class="text-gray-400">
                        Tidak ada jadwal hari ini
                    </p>

                    @endforelse

                </div>

            </div>

            {{-- LATEST ACTIVITY --}}
            <div class="bg-white rounded-2xl shadow">

                <div class="p-6 border-b">
                    <h2 class="text-xl font-bold text-gray-800">
                        Aktivitas Terbaru
                    </h2>
                </div>

                <div class="p-6">

                    @forelse($latestActivities as $activity)

                    <div class="border rounded-xl p-4 mb-4">

                        <h3 class="font-semibold text-gray-800">
                            {{ $activity->title }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Batch:
                            {{ $activity->plantBatch->batch_code }}
                        </p>

                        <p class="text-sm text-gray-400 mt-2">
                            Oleh {{ $activity->creator->name }}
                            •
                            {{ $activity->activity_date }}
                        </p>

                    </div>

                    @empty

                    <p class="text-gray-400">
                        Belum ada aktivitas
                    </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</body>

</html>