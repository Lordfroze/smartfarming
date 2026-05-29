@extends('layouts.master')
@section('title', 'Tambah Care Template')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            📅 Tambah Care Template
        </h1>

        <form method="POST"
            action="{{ route('care-templates.store') }}"
            class="space-y-5">

            @csrf

            <div>
                <label class="block mb-1 text-sm font-medium">
                    Jenis Tanaman
                </label>

                <select name="plant_type_id"
                    class="w-full rounded-xl border-gray-300 shadow-sm">

                    @foreach($plantTypes as $plantType)

                    <option value="{{ $plantType->id }}">
                        {{ $plantType->name }}
                    </option>

                    @endforeach

                </select>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">
                    Hari Ke
                </label>

                <input type="number"
                    name="day_offset"
                    class="w-full rounded-xl border-gray-300 shadow-sm">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">
                    Jenis Aktivitas
                </label>

                <input type="text"
                    name="activity_type"
                    placeholder="watering / fertilizing"
                    class="w-full rounded-xl border-gray-300 shadow-sm">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">
                    Judul
                </label>

                <input type="text"
                    name="title"
                    class="w-full rounded-xl border-gray-300 shadow-sm">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">
                    Deskripsi
                </label>

                <textarea name="description"
                    rows="4"
                    class="w-full rounded-xl border-gray-300 shadow-sm"></textarea>
            </div>

            <div class="flex justify-end gap-3">

                <a href="{{ route('care-templates.index') }}"
                    class="px-5 py-2 rounded-xl bg-gray-200">

                    Batal

                </a>

                <button class="px-6 py-2 rounded-xl bg-green-600
                               hover:bg-green-700 text-white">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>
@endsection