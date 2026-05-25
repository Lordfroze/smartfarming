<form method="POST" action="{{ route('plant-batches.store') }}">
    @csrf

    <div>
        <label>Jenis Tanaman</label>

        <select name="plant_type_id">
            @foreach($plantTypes as $plantType)
            <option value="{{ $plantType->id }}">
                {{ $plantType->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Lokasi</label>

        <select name="location_id">
            @foreach($locations as $location)
            <option value="{{ $location->id }}">
                {{ $location->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Kode Batch</label>
        <input type="text" name="batch_code">
    </div>

    <div>
        <label>Tanggal Tanam</label>
        <input type="date" name="start_date">
    </div>

    <div>
        <label>Total Benih</label>
        <input type="number" name="total_seed">
    </div>

    <div>
        <label>Catatan</label>
        <textarea name="notes"></textarea>
    </div>

    <button type="submit">
        Simpan
    </button>
</form>