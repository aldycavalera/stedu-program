<select class="custom-select" name="sesi_id">
  @foreach ($Sesi as $sesi)
    <option value="{{ $sesi->id }}">{{ $sesi->sesi_key }}</option>
  @endforeach
</select>
