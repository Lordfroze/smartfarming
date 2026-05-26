@extends('layouts.master')
@section('title', 'Tambah Plant Type')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            🌱 Tambah Plant Type
        </h1>

        <form method="POST"
            action="{{ route('plant-types.store') }}"
            class="space-y-5">

            @csrf

            <div>
                <label class="block mb-1 text-sm font-medium">
                    Nama Tanaman
                </label>

                <input type="text"
                    name="name"
                    class="w-full rounded-xl border-gray-300 shadow-sm">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">
                    Kategori
                </label>

                <input type="text"
                    name="category"
                    class="w-full rounded-xl border-gray-300 shadow-sm">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">
                    Estimasi Panen (hari)
                </label>

                <input type="number"
                    name="estimated_harvest_days"
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

                <a href="{{ route('plant-types.index') }}"
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