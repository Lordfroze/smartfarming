@extends('layouts.master')
@section('title', 'Riwayat Aktivitas')
@section('description', 'Daftar riwayat aktivitas pertanian')
@section('content')
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-50 border-b">
            <tr class="text-left text-sm text-gray-600">

                <th class="p-4">Tanggal</th>
                <th class="p-4">Batch</th>
                <th class="p-4">Tanaman</th>
                <th class="p-4">Aktivitas</th>
                <th class="p-4">User</th>

            </tr>
        </thead>

        <tbody>

            @forelse($logs as $log)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-4">
                    {{ $log->activity_date }}
                </td>

                <td class="p-4 font-semibold">
                    {{ $log->plantBatch->batch_code }}
                </td>

                <td class="p-4">
                    {{ $log->plantBatch->plantType->name }}
                </td>

                <td class="p-4">
                    {{ $log->title }}
                </td>

                <td class="p-4">
                    {{ $log->creator->name }}
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="5"
                    class="p-8 text-center text-gray-400">

                    Belum ada aktivitas

                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>
@endsection