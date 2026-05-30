@extends('layouts.master')
@section('title', 'Plant Batches')
@section('description', 'Daftar kelompok tanaman ')
@section('content')

@if(session('success'))
<div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
    {{ session('success') }}
</div>
@endif

<div class="flex justify-end mb-6">
    <a href="{{ route('plant-batches.create') }}"
        class="bg-green-600 hover:bg-green-700
                      text-white px-5 py-3 rounded-xl shadow">

        + Tambah Batch

    </a>
</div>

<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-50 border-b">
            <tr class="text-left text-gray-600 text-sm">

                <th class="p-4">Batch</th>
                <th class="p-4">Tanaman</th>
                <th class="p-4">Lokasi</th>
                <th class="p-4">Tanggal Tanam</th>
                <th class="p-4">Estimasi Panen</th>
                <th class="p-4">Status</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($plantBatches as $batch)

            <tr class="border-b hover:bg-gray-50 transition">

                <td class="p-4 font-semibold text-gray-800">
                    {{ $batch->batch_code }}
                </td>

                <td class="p-4">
                    {{ $batch->plantType->name }}
                </td>

                <td class="p-4">
                    {{ $batch->location->name }}
                </td>

                <td class="p-4">
                    {{ $batch->start_date->format('d M Y') }}
                </td>

                <td class="p-4">
                    {{ $batch->estimated_harvest_date?->format('d M Y') }}
                </td>

                <td class="p-4">

                    <span class="
                                    px-3 py-1 rounded-full text-xs font-medium

                                    @if($batch->status === 'active')
                                        bg-green-100 text-green-700
                                    @elseif($batch->status === 'harvested')
                                        bg-blue-100 text-blue-700
                                    @else
                                        bg-gray-100 text-gray-700
                                    @endif
                                ">
                        {{ ucfirst($batch->status) }}
                    </span>
                </td>

                <td class="p-4 flex gap-2">

                    {{-- Edit --}}
                    <a href="{{ route('plant-batches.edit', $batch->id) }}"
                        class="bg-blue-500 text-white px-3 py-1 rounded-lg text-sm">
                        Edit
                    </a>

                    {{-- Nonaktif / Aktif --}}
                    @if($batch->status === 'active')

                    <form method="POST"
                        action="{{ route('plant-batches.destroy', $batch->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm">
                            Nonaktifkan
                        </button>
                    </form>

                    @else

                    <form method="POST"
                        action="{{ route('plant-batches.activate', $batch->id) }}">
                        @csrf
                        @method('PATCH')

                        <button class="bg-green-500 text-white px-3 py-1 rounded-lg text-sm">
                            Aktifkan Lagi
                        </button>

                    </form>

                    @endif

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" class="p-8 text-center text-gray-400">
                    Belum ada batch tanaman
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

</div>
@endsection