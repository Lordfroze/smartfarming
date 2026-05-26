@extends('layouts.master')
@section('title', 'Edit Plant Batch')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            ✏️ Edit Plant Batch
        </h1>

        <form method="POST"
            action="{{ route('plant-batches.update', $plantBatch->id) }}"
            class="space-y-5">

            @csrf
            @method('PUT')

            {{-- Jenis Tanaman --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Jenis Tanaman
                </label>

                <select name="plant_type_id"
                    class="w-full border-gray-300 rounded-xl shadow-sm">

                    @foreach($plantTypes as $plantType)

                    <option value="{{ $plantType->id }}"
                        @selected($plantBatch->plant_type_id == $plantType->id)>

                        {{ $plantType->name }}

                    </option>

                    @endforeach

                </select>
            </div>

            {{-- Lokasi --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Lokasi
                </label>

                <select name="location_id"
                    class="w-full border-gray-300 rounded-xl shadow-sm">

                    @foreach($locations as $location)

                    <option value="{{ $location->id }}"
                        @selected($plantBatch->location_id == $location->id)>

                        {{ $location->name }}

                    </option>

                    @endforeach

                </select>
            </div>

            {{-- Batch Code --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kode Batch
                </label>

                <input type="text"
                    name="batch_code"
                    value="{{ $plantBatch->batch_code }}"
                    class="w-full border-gray-300 rounded-xl shadow-sm">
            </div>

            {{-- Tanggal --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Tanggal Tanam
                </label>

                <input type="date"
                    name="start_date"
                    value="{{ $plantBatch->start_date->format('Y-m-d') }}"
                    class="w-full border-gray-300 rounded-xl shadow-sm">
            </div>

            {{-- Total Seed --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Total Benih
                </label>

                <input type="number"
                    name="total_seed"
                    value="{{ $plantBatch->total_seed }}"
                    class="w-full border-gray-300 rounded-xl shadow-sm">
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Status
                </label>

                <select name="status"
                    class="w-full border-gray-300 rounded-xl shadow-sm">

                    <option value="active"
                        @selected($plantBatch->status === 'active')>
                        Active
                    </option>

                    <option value="inactive"
                        @selected($plantBatch->status === 'inactive')>
                        Inactive
                    </option>

                </select>
            </div>

            {{-- Notes --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Catatan
                </label>

                <textarea name="notes"
                    rows="3"
                    class="w-full border-gray-300 rounded-xl shadow-sm">{{ $plantBatch->notes }}</textarea>
            </div>

            {{-- Button --}}
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('plant-batches.index') }}"
                    class="px-5 py-2 rounded-xl bg-gray-200 hover:bg-gray-300">

                    Batal

                </a>

                <button type="submit"
                    class="px-6 py-2 rounded-xl bg-green-600
                               hover:bg-green-700 text-white font-semibold">

                    Update Batch

                </button>

            </div>

        </form>

    </div>

</div>
@endsection