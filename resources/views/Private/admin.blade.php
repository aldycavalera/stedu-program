@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin kelas {{ $Class->value }}</div>
                <div class="card-body">

                  {{-- untuk menampilkan posisi siswa --}}
                  @if (isset($Users->userData) || isset($Users->userData->currentLoc))

                     @if ($data['status']=='OK')
                       <?php   $map  = $data['results'][0]['formatted_address']; ?>
                       <p><?=  $Users->name ?> sedang berada di {{ $map }}</p>
                     @endif

                  @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
