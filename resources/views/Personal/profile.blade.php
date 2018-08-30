@extends('layouts.app')
@section('content')

  <?php
  try {
    // cek apakah user online atau user tidak dapat mengakses api dari google
    $url="https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyD4jM9eRgT4Hc-OX3suo3xNB2tK2AgskOo&latlng=";
    $json = file_get_contents($url.$Users->userData->currentLoc);
    $data = json_decode($json, TRUE);
  } catch (\Exception $e) {
    $data = false;
    $currentState = array(
      'user_id'       => Auth::id(),
      'user_username' => Auth::user()->username,
      'user_status'   => 'offline'
    );
  }
   ?>

@if (isset($currentState) && !isset($_GET['offline']))
  {{ view('sys.offline') }}
@elseif ( isset($_GET['offline']) || $data )
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="navbar card-header">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      {{ $Users->name }} |
                       <a href="{{route('classes')}}">{{ $userData['Classes']->value }}</a>
                       @if ($Users->UserClass->status=="0")
                         <span class="bg-warning py-1 px-2 mx-3" style="border-radius:3px; box-shadow:5px 5px 5px #dedede"> Inactive! </span>
                       @endif
                    </li>
                  </ul>
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item"> <i class="fa fa-edit"></i> </li>
                  </ul>
                </div>

                {{-- KONTEN Yang ingin diview ke user --}}
                <div class="card-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-3 each-profile-menu">
                            <a href="{{ route('classes') }}" class="p-3 bg-primary" style="width: 100% !important;
                            height: 7rem; display:flex">
                              <div class="content">
                                <h6>Masuk kelas</h6>
                              </div>
                            </a>
                          </div>
                      </div>
                  </div>
                  @if (isset($currentState))
                    <div text-align-center>
                      <h6 class="mt-3"> <strong> Oops! </strong> sepertinya kamu <span c-red>Disconnected</span> dari Internet. Beberapa fitur dinonaktifkan</h6>
                      <span>Silahkan cek koneksi, tunggu <strong id="countdowntimer">10</strong> detik dan <a href="?_rdr"> <i class="fa fa"> Reconnect </i> </a></span>
                    </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>













{{-- HIDDEN FORM UNTUK AMBIL DATA POSISI SISWA  --}}
<form class="" name="gMaps" id="gMaps" action="{{ route('trackMaps') }}" method="POST">
  @csrf
  <input type="hidden" name="user_id" value="{{$Users->id}}">
  <input type="hidden" name="location" id="startLat">
  <button type="submit" hidden class="btn btn-primary">Update</button>
</form>

<script>
  var timeleft = 10;
  var downloadTimer = setInterval(function(){
  timeleft--;
  document.getElementById("countdowntimer").textContent = timeleft;
  if(timeleft <= 0)
      clearInterval(downloadTimer);
  },1000);
</script>

<script>
$(document).ready(function(){
  $('#gMaps').submit(ajax);
})
function ajax(){
      $.ajax({
          url : '{{ route('trackMaps') }}',
          type : 'POST',
          data : $('form').serialize(),
      });
      return false;
}
window.onload=function(){
  var startPos;
  var geoOptions = {
    enableHighAccuracy: true
  }

  var geoSuccess = function(position) {
    startPos = position;
    var lat = startPos.coords.latitude;
    var long = startPos.coords.longitude;
    var latLong = lat+','+long;
    document.getElementById('startLat').value = latLong;
  };
  var geoError = function(error) {
    console.log('Error occurred. Error code: ' + error.code);
  };

  navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);
  // 1000 = 1detik
  var sec = 5000;
  setInterval(ajax, sec);
}
</script>

@endif
@endsection
