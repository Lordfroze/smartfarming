@extends('layouts.master')
@section('title', 'Jadwal Perawatan')
@section('description', 'Daftar jadwal perawatan tanaman')
@section('content')
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-50 border-b">
            <tr class="text-left text-sm text-gray-600">

                <th class="p-4">Batch</th>
                <th class="p-4">Tanaman</th>
                <th class="p-4">Aktivitas</th>
                <th class="p-4">Tanggal</th>
                <th class="p-4">Status</th>

            </tr>
        </thead>

        <tbody>

            @forelse($schedules as $schedule)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-4 font-semibold">
                    {{ $schedule->plantBatch->batch_code }}
                </td>

                <td class="p-4">
                    {{ $schedule->plantBatch->plantType->name }}
                </td>

                <td class="p-4">
                    {{ $schedule->careTemplate->title }}
                </td>

                <td class="p-4">
                    {{ $schedule->scheduled_date->format('d M Y') }}
                </td>

                <td class="p-4">

                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                bg-yellow-100 text-yellow-700">

                        {{ ucfirst($schedule->status) }}

                    </span>

                </td>
                <th class="p-4">
                <td class="p-4">

                    @if($schedule->status !== 'completed')

                    <form
                        action="{{ route('care-schedules.complete', $schedule) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')

                        <button
                            class="bg-green-600 hover:bg-green-700
                       text-white text-sm px-3 py-2 rounded-lg">

                            Selesai

                        </button>

                    </form>

                    @endif

                </td>
                </th>


            </tr>

            @empty

            <tr>
                <td colspan="5"
                    class="p-8 text-center text-gray-400">

                    Belum ada jadwal

                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>
@endsection