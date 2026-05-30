@extends('layouts.master')
@section('title', 'Plant Types')
@section('description', 'Daftar jenis tanaman')
@section('content')
<div class="min-h-screen bg-gray-100 p-6">

    <div class="max-w-6xl mx-auto">

        <div class="flex items-center justify-end mb-6">

            <a href="{{ route('plant-types.create') }}"
                class="bg-green-600 hover:bg-green-700
                      text-white px-5 py-3 rounded-xl shadow">

                + Tambah Jenis Tanaman

            </a>

        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-50 border-b">

                    <tr class="text-left text-sm text-gray-600">

                        <th class="p-4">Nama</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4">Estimasi Panen</th>
                        <th class="p-4">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($plantTypes as $plant)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-4 font-semibold">
                            {{ $plant->name }}
                        </td>

                        <td class="p-4">
                            {{ $plant->category }}
                        </td>

                        <td class="p-4">
                            {{ $plant->estimated_harvest_days }} hari
                        </td>

                        <td class="p-4 flex gap-2">

                            <a href="{{ route('plant-types.edit', $plant->id) }}"
                                class="bg-blue-500 text-white
                                          px-3 py-1 rounded-lg text-sm">

                                Edit

                            </a>

                            <form method="POST"
                                action="{{ route('plant-types.destroy', $plant->id) }}">

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
                        <td colspan="4"
                            class="p-8 text-center text-gray-400">

                            Belum ada data tanaman

                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection