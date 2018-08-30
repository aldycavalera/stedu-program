@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

              @if ($Users->UserClass->status=="0")

                  @if ($Classes->id == $UserClass->class_id && $UserClass->status == 0)
                    <div class="form-wrapper" style="height:45vh;">
                      <form class="form-inline confirm-class" style="height:100%" method="post" action="{{ route('authClass') }}">
                        {{ csrf_field() }}
                        <h2 m0-auto uppercase><strong> <span c-red>Akses</span> dibutuhkan!</strong></h2>
                        <div class="container">
                          @if (session('authKey'))
                            <div class="alert alert-warning" style="margin-top:-4rem">
                              Kode akses <strong>{{ session('authKey') }}</strong> tidak valid
                            </div>
                          @endif
                          <div class="col-md-12" text-align-center>
                            <p c-gray>Kami melihat kamu sedang mencoba untuk masuk ke kelas {{ $Classes->value }}
                            Ini terjadi apabila kamu beru pertama kali mengakses kelas ini atau terjadi perubahan
                            dalam database dengan alasan keamanan.
                            Jika kamu melihat ini sebagai kesalahan, laporkan ini ke admin yang bersangkutan
                          </div>
                          <div class="col-md-12">
                            <div class="form-group m-auto">
                              <input type="hidden" name="from" value="{{ session('from') }}">
                              <label for="authKey" class="sr-only">Masukan Kode</label>
                              <input type="text" maxlength="6" minlength="6" class="form-control w-50 m-auto" text-align-center
                              id="authKey" name="authKey" placeholder="Masukan Kode" value="{{ session('authKey') }}">
                            </div>
                          </div>
                          <div class="bottom-0 col-md-12 p-0">
                            <button type="submit" class="btn btn-primary bot-btn">Konfirmasi Kode</button>
                          </div>

                        </div>
                      </form>
                    </div>
                  @endif

              @else

                {{-- Ambil nama kelas --}}
                  @if ($Users->UserClass->class_id == $Classes->id)
                    <?php $className = $Classes->value ?>
                  @endif

                <div class="card-header">Kelas {{ $className }}</div>
                <div class="card-body">

                </div>
              @endif
            </div>
        </div>
    </div>
</div>

@endsection
