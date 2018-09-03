@extends('layouts.cbtlay')
@section('content')

<div id="wrap">
  <div id="modalGetEditor" class="iziModal" @if (session('isError')==true) data-iziModal-subtitle="{{session('isError')}}" @endif>
    <form class="" action="{{ route('getEditorURL') }}" method="post" id="getNewEditor">
      {{ csrf_field() }}
      <div class="container-fluid">
        <div class="my-3" id="getEditor"></div>
        <button type="submit" class="btn mb-3 btn-sm btn-block" style="
        background-image:linear-gradient(to right,#7c47bc, #4A148C, #7c47bc);color:#fff">
          Edit Soal
        </button>
      </div>
    </form>
  </div>

  <div id="modalInsertNew" class="iziModal" @if (session('isError')==true) data-iziModal-subtitle="{{session('isError')}}" @endif>
    <form method="post" autocomplete="off" id="insertNewEditor" action="{{ route('addSoal') }}">
      {{ csrf_field() }}
      <div class="container-fluid my-3">

        <div class="form-group row">
          <label for="Mapel" class="col-sm-2 col-form-label">Pilih mapel</label>
          <div class="col-sm-10" id="getMapel"></div>
        </div>

        <div class="form-group row">
          <label for="sesiKey" class="col-sm-2 col-form-label">Pilih sesi</label>
          <div class="col-md-7">
            <input type="text" name="sesi_new_key" class="form-control" id="sesi_key" value="" readonly>
          </div>
          <div class="col-md-3">
            <button type="button" class="btn btn-outline-info" onclick="newAccessCode()">Generate Kode Sesi</button>
          </div>

        </div>
        <button type="submit" class="btn btn-sm btn-block" onclick="ifSuccess()" style="
        background-image:linear-gradient(to right,#7c47bc, #4A148C, #7c47bc);color:#fff">
          Buat Soal!
        </button>
      </div>
    </form>
  </div>
</div>

<div class="" id="editor">

</div>


    {{-- LOADING --}}
    <div id="loading" style="height:80vh;display:flex; width:100% !important">
      <center style="align-self:center; margin:0 auto">
        <h6 style="font-family:sans-serif; font-weight:300; color:gray">Memuat editor...</h6>
        <img src="{{ asset('/resources/assets/img/loading.gif') }}" alt="" width="50">
      </center>
    </div>



<script>
  function newAccessCode() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (var i = 0; i < 6; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));
    document.getElementById("sesi_key").value = text;
  }
  function ifSuccess() {
    iziToast.success({
        title: 'Tersimpan.',
        message: 'Data berhasil tersimpan di database!',
    });
  }
  $('#modalInsertNew').submit(function(e) {
      e.preventDefault();
      $.post('<?= route('addSoal') ?>', $('#insertNewEditor').serialize());
  });
</script>

  <script>
  $("#modalGetEditor").iziModal({
    title: 'Pilih soal untuk diedit <span style="float:right;font-size:.8em">slide untuk membuat yang baru</span>',
    headerColor: 'linear-gradient(to left, #4A148C, #7c47bc)',
    top: '5%',
    width: '50%',
    focusInput:true,
    autoOpen:1,
    group:'editor',
    closeOnEscape: false,
    closeButton: false,
    navigateCaption: false,
    navigateArrows:true,
    overlayColor: 'rgba(75, 75, 75, .85)',
    // overlay:false,
    // appendToOverlay: '#stickIt',
    icon: 'fa fa-newspaper',
    @if (session('URL'))
    autoOpen:0,
      afterRender: function(modal) {
        $.get('<?= session('URL') ?>', function(data) {
            $('#loading').remove();
            $("#editor").html(data);
        });
      },
    @endif
    onOpening: function(modal) {
      modal.startLoading();
      $.get('<?= route('getAllSoal') ?>', function(data) {
          modal.stopLoading();
          $("#getEditor").html(data);
      });
    }
  });

  </script>
  <script>
  $("#modalInsertNew").iziModal({
    title: 'Buat Soal',
    headerColor: 'linear-gradient(to left,#7c47bc,#4A148C)',
    top: '5%',
    width: '50%',
    focusInput:true,
    navigateCaption: false,
    autoOpen:0,
    navigateArrows:true,
    group:'editor',
    closeOnEscape: false,
    closeButton: false,
    overlayColor: 'rgba(75, 75, 75, .85)',
    // appendToOverlay: '#stickIt',
    icon: 'fa fa-newspaper',
    onOpening: function(modal) {
      modal.startLoading();
      $.get('<?= route('getAllMapel') ?>', function(data) {
          modal.stopLoading();
          $("#getMapel").html(data);
      });
    }
  });
  </script>


@endsection
