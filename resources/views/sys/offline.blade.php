@extends('layouts.app')
@section('content')

<div class="wrap" style="height:80vh;display:flex">
  <div class="container align-self-center">
    <center>
      <h1 style="font-size:5em"><strong><span style="color:red">OFF</span>LINE!</strong></h1>
      <h4> <strong> Oops! </strong> sepertinya kamu <span c-red>Disconnected</span> dari Internet</h4>
      <a href="?offline=true&userid={{ Auth::id() }}">Akses secara <strong c-red>offline</strong></a>
    </center>
  </div>
</div>

<footer style="font-size:.8em">
  <p c-red text-align-center uppercase> <a href="#">Hubungi kami jika terdapat kesalahan </a></p>
</footer>


@endsection
