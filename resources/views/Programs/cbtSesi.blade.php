@extends('layouts.cbtlay')
@section('content')

@if (!session('url'))
  <div id="modalSesi" class="iziModal" @if (session('isError')==true) data-iziModal-subtitle="{{session('isError')}}" @endif>
    <form method="post" autocomplete="off" id="sesiForm" action="{{ route('cekSesi') }}">
      {{ csrf_field() }}
      <div class="container-fluid my-3">
        <div class="form-group">
          <input type="text" id="sesiKey" style="text-align:center" class="form-control" name="sesiKey"
          maxlength="6" minlength="6" placeholder="6 Digit Kode sesi">
          <button type="button" class="btn" hidden></button>
        </div>
      </div>
    </form>
  </div>


  <script>
  $("#modalSesi").iziModal({
    title: 'Masukan Kode Sesi',
    headerColor: '#4A148C',
    top: '5%',
    focusInput:true,
    autoOpen:1,
    closeOnEscape: false,
    closeButton: false,
    overlay:false,
    appendToOverlay: '.stickIt',
    icon: 'fa fa-exclamation',
    onClosed: function(){
      window.location.href = '<?= route('home'); ?>';
    },
  });
  </script>
@endif
{{-- LOADING --}}
<div id="loading" style="height:80vh;display:flex; width:100% !important">
  <center style="align-self:center; margin:0 auto">
    <h6 style="font-family:sans-serif; font-weight:300; color:gray">Memuat soal...</h6>
    <img src="{{ asset('/resources/assets/img/loading.gif') }}" alt="" width="50">
  </center>
</div>
{{-- SOAL CONTAINER --}}
@if (session('url'))
  <div id="soal">
  </div>
  <script>
    $.get('<?= session('url') ?>', function(data) {
        $("#soal").addClass("animated fadeIn");
        $("#soal").html(data);
        $('#loading').remove();
    });
  </script>
@endif
<div class="" id="soal"></div>
@endsection
