@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @foreach ($Programs as $programs)
        @if ($programs->status == 'active' || $programs->status == 'soon')
          <div class="col-md-4 column">
            <div class="card program-card <?= $programs->status == 'active' ? 'gr-1' : 'gr-2' ?>">
              <div class="txt">
                <h1>{{ $programs->name }}</h1>
                <p>{{ $programs->description }}</p>
              </div>
              <a href="{{ route('home').'/'.$programs->taxonomy_key }}">Selengkapnya...</a>
              <div class="ico-card">
              <i class="fa fa-rebel"></i>
            </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
</div>
@endsection
