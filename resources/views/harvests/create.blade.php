@extends('layouts.master')
@section('title', 'Create Harvest')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            🌾 Tambah Data Panen
        </h1>

        <form method="POST"
            action="{{ route('harvests.store') }}"
            class="space-y-5">

            @csrf

            {{-- Batch --}}
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Plant Batch
                </label>

                <select name="plant_batch_id"
                    class="w-full rounded-xl border-gray-300 shadow-sm">

                    @foreach($batches as $batch)

                    <option value="{{ $batch->id }}">
                        {{ $batch->batch_code }}
                        -
                        {{ $batch->plantType->name }}
                    </option>

                    @endforeach

                </select>
            </div>

            {{-- Harvest Date --}}
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Tanggal Panen
                </label>

                <input type="date"
                    name="harvest_date"
                    class="w-full rounded-xl border-gray-300 shadow-sm">
            </div>

            {{-- Quantity --}}
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Jumlah Panen
                </label>

                <input type="number"
                    step="0.01"
                    name="quantity"
                    class="w-full rounded-xl border-gray-300 shadow-sm"
                    placeholder="Contoh: 50">
            </div>

            {{-- Unit --}}
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Satuan
                </label>

                <select name="unit"
                    class="w-full rounded-xl border-gray-300 shadow-sm">

                    <option value="ikat">Ikat</option>
                    <option value="kg">Kg</option>
                    <option value="pcs">Pcs</option>
                    <option value="box">Box</option>

                </select>
            </div>

            {{-- Quality --}}
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Grade Kualitas
                </label>

                <select name="quality_grade"
                    class="w-full rounded-xl border-gray-300 shadow-sm">

                    <option value="A">Grade A</option>
                    <option value="B">Grade B</option>
                    <option value="C">Grade C</option>

                </select>
            </div>

            {{-- Notes --}}
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Catatan
                </label>

                <textarea name="notes"
                    rows="4"
                    class="w-full rounded-xl border-gray-300 shadow-sm"></textarea>
            </div>

            {{-- Button --}}
            <div class="flex justify-end gap-3">

                <a href="{{ route('harvests.index') }}"
                    class="px-5 py-2 rounded-xl bg-gray-200">

                    Batal

                </a>

                <button class="px-6 py-2 rounded-xl bg-green-600
                               hover:bg-green-700 text-white">

                    Simpan Panen 🌾

                </button>

            </div>

        </form>

    </div>

</div>
@endsection