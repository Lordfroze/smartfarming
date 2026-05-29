@extends('layouts.master')
@section('title', 'Edit Harvest')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            ✏️ Edit Data Panen
        </h1>

        <form method="POST"
            action="{{ route('harvests.update', $harvest->id) }}"
            class="space-y-5">

            @csrf
            @method('PUT')

            {{-- Batch --}}
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Plant Batch
                </label>

                <select name="plant_batch_id"
                    class="w-full rounded-xl border-gray-300 shadow-sm">

                    @foreach($batches as $batch)

                    <option value="{{ $batch->id }}"
                        @selected($harvest->plant_batch_id == $batch->id)>

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
                    value="{{ $harvest->harvest_date }}"
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
                    value="{{ $harvest->quantity }}"
                    class="w-full rounded-xl border-gray-300 shadow-sm">
            </div>

            {{-- Unit --}}
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Satuan
                </label>

                <select name="unit"
                    class="w-full rounded-xl border-gray-300 shadow-sm">

                    <option value="ikat"
                        @selected($harvest->unit == 'ikat')>
                        Ikat
                    </option>

                    <option value="kg"
                        @selected($harvest->unit == 'kg')>
                        Kg
                    </option>

                    <option value="pcs"
                        @selected($harvest->unit == 'pcs')>
                        Pcs
                    </option>

                    <option value="box"
                        @selected($harvest->unit == 'box')>
                        Box
                    </option>

                </select>
            </div>

            {{-- Grade --}}
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Grade Kualitas
                </label>

                <select name="quality_grade"
                    class="w-full rounded-xl border-gray-300 shadow-sm">

                    <option value="A"
                        @selected($harvest->quality_grade == 'A')>
                        Grade A
                    </option>

                    <option value="B"
                        @selected($harvest->quality_grade == 'B')>
                        Grade B
                    </option>

                    <option value="C"
                        @selected($harvest->quality_grade == 'C')>
                        Grade C
                    </option>

                </select>
            </div>

            {{-- Notes --}}
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Catatan
                </label>

                <textarea name="notes"
                    rows="4"
                    class="w-full rounded-xl border-gray-300 shadow-sm">{{ $harvest->notes }}</textarea>
            </div>

            {{-- Button --}}
            <div class="flex justify-end gap-3">

                <a href="{{ route('harvests.index') }}"
                    class="px-5 py-2 rounded-xl bg-gray-200">

                    Batal

                </a>

                <button class="px-6 py-2 rounded-xl bg-blue-600
                               hover:bg-blue-700 text-white">

                    Update Panen

                </button>

            </div>

        </form>

    </div>

</div>
@endsection