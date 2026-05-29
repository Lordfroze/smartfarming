@extends('layouts.master')
@section('title', 'Harvests')
@section('content')
<div class="min-h-screen bg-gray-100 p-6">

    <div class="max-w-7xl mx-auto">

        <div class="flex items-center justify-between mb-6">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    🌾 Harvests
                </h1>

                <p class="text-gray-500 mt-1">
                    Data hasil panen
                </p>
            </div>

            <a href="{{ route('harvests.create') }}"
                class="bg-green-600 hover:bg-green-700
                      text-white px-5 py-3 rounded-xl shadow">

                + Tambah Panen

            </a>

        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-50 border-b">

                    <tr class="text-left text-sm text-gray-600">

                        <th class="p-4">Batch</th>
                        <th class="p-4">Tanaman</th>
                        <th class="p-4">Jumlah</th>
                        <th class="p-4">Kualitas</th>
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($harvests as $harvest)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-4 font-semibold">
                            {{ $harvest->plantBatch->batch_code }}
                        </td>

                        <td class="p-4">
                            {{ $harvest->plantBatch->plantType->name }}
                        </td>

                        <td class="p-4">
                            {{ $harvest->quantity }}
                            {{ $harvest->unit }}
                        </td>

                        <td class="p-4">
                            {{ $harvest->quality_grade }}
                        </td>

                        <td class="p-4">
                            {{ $harvest->harvest_date }}
                        </td>

                        <td class="p-4 flex gap-2">

                            <a href="{{ route('harvests.edit', $harvest) }}"
                                class="bg-blue-500 text-white
                                          px-3 py-1 rounded-lg text-sm">

                                Edit

                            </a>

                            <form method="POST"
                                action="{{ route('harvests.destroy', $harvest) }}">

                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 text-white
                                                   px-3 py-1 rounded-lg text-sm">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5"
                            class="p-8 text-center text-gray-400">

                            Belum ada data panen

                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection