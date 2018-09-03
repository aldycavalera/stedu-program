<div class="row">
  <div class="col-md-6">
    <select class="form-control" name="soal_id">
      @foreach ($Soal as $soal)
        @foreach ($SesiKey as $sesi)
          @foreach ($Mapel as $mapel)
            @if ($soal->mapel_id == $mapel->id && $soal->sesi_id == $sesi->id)
              <option value="{{ $soal->id }}">{{ $mapel->nama_mapel }} - {{ $sesi->sesi_key }}</option>
            @endif
          @endforeach
        @endforeach
      @endforeach
    </select>
  </div>
  <div class="col-md-6">
    <select class="form-control" name="mapel">
      @foreach ($Mapel as $mapel)
        <option value="{{ $mapel->nama_mapel }}">{{ $mapel->nama_mapel }}</option>
      @endforeach
    </select>
  </div>
</div>
