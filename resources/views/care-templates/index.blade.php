@extends('layouts.master')
@section('title', 'Care Templates')
@section('description', 'Daftar template jadwal otomatis tanaman')
@section('content')
<div class="min-h-screen bg-gray-100 p-6">

    <div class="max-w-7xl mx-auto">

        <div class="flex items-center justify-end mb-6">

            <a href="{{ route('care-templates.create') }}"
                class="bg-green-600 hover:bg-green-700
                      text-white px-5 py-3 rounded-xl shadow">

                + Tambah Template

            </a>

        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-50 border-b">

                    <tr class="text-left text-sm text-gray-600">

                        <th class="p-4">Tanaman</th>
                        <th class="p-4">Hari Ke</th>
                        <th class="p-4">Aktivitas</th>
                        <th class="p-4">Judul</th>
                        <th class="p-4">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($templates as $template)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-4 font-semibold">
                            {{ $template->plantType->name }}
                        </td>

                        <td class="p-4">
                            Hari ke-{{ $template->day_offset }}
                        </td>

                        <td class="p-4">
                            {{ $template->activity_type }}
                        </td>

                        <td class="p-4">
                            {{ $template->title }}
                        </td>

                        <td class="p-4 flex gap-2">

                            <a href="{{ route('care-templates.edit', $template->id) }}"
                                class="bg-blue-500 text-white
                                          px-3 py-1 rounded-lg text-sm">

                                Edit

                            </a>

                            <form method="POST"
                                action="{{ route('care-templates.destroy', $template->id) }}">

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

                            Belum ada template

                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection