<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8">

            <h1 class="text-2xl font-bold text-gray-800 mb-6">
                🌱 Tambah Plant Batch
            </h1>

            <form method="POST" action="{{ route('plant-batches.store') }}" class="space-y-5">
                @csrf

                {{-- Jenis Tanaman --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Tanaman
                    </label>

                    <select name="plant_type_id"
                        class="w-full border-gray-300 rounded-xl shadow-sm
                               focus:border-green-500 focus:ring focus:ring-green-200">

                        @foreach($plantTypes as $plantType)
                        <option value="{{ $plantType->id }}">
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
                        class="w-full border-gray-300 rounded-xl shadow-sm
                               focus:border-green-500 focus:ring focus:ring-green-200">

                        @foreach($locations as $location)
                        <option value="{{ $location->id }}">
                            {{ $location->name }}
                        </option>
                        @endforeach

                    </select>
                </div>

                {{-- Kode Batch --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Kode Batch
                    </label>

                    <input type="text"
                        name="batch_code"
                        class="w-full border-gray-300 rounded-xl shadow-sm
                              focus:border-green-500 focus:ring focus:ring-green-200"
                        placeholder="Contoh: KNG-001">
                </div>

                {{-- Tanggal Tanam --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Tanam
                    </label>

                    <input type="date"
                        name="start_date"
                        class="w-full border-gray-300 rounded-xl shadow-sm
                              focus:border-green-500 focus:ring focus:ring-green-200">
                </div>

                {{-- Total Benih --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Total Benih
                    </label>

                    <input type="number"
                        name="total_seed"
                        class="w-full border-gray-300 rounded-xl shadow-sm
                              focus:border-green-500 focus:ring focus:ring-green-200"
                        placeholder="Jumlah benih">
                </div>

                {{-- Catatan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Catatan
                    </label>

                    <textarea name="notes"
                        rows="3"
                        class="w-full border-gray-300 rounded-xl shadow-sm
                                 focus:border-green-500 focus:ring focus:ring-green-200"
                        placeholder="Opsional..."></textarea>
                </div>

                {{-- Button --}}
                <div class="pt-4 flex justify-end gap-3">

                    <a href="{{ route('plant-batches.index') }}"
                        class="px-5 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-6 py-2 rounded-xl bg-green-600 hover:bg-green-700
                               text-white font-semibold shadow">
                        Simpan Batch 🌱
                    </button>

                </div>

            </form>

        </div>

    </div>
</body>

</html>