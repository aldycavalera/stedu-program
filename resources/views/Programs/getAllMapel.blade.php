<select class="custom-select" name="mapel_id">
  @foreach ($Mapel as $mapel)
    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
  @endforeach
</select>
