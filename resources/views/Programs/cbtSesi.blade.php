<!DOCTYPE html>
<html>
    <head>
        <title>The example shows how to create a Quiz, jQuery Survey Library Example</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('/resources/assets/js/bootstrap/jquery.min.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/survey.jquery.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/iziModal.min.js') }}"></script>

        <link href="{{ asset('/resources/assets/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/survey.css') }}">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/iziModal.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/fontawesome.min.css') }}">
        <style media="screen">
          h4 {
            font-family: 'Oswald', sans-serif;
          }
        </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-md navbar-laravel" style="background: #4B4B4B; color:#fff">
          <div class="container-fluid">
              <a class="navbar-brand" href="{{ url('/') }}">
                  <span class="logo">Stedu</span>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">

                    <li class="nav-item mr-5">
                      <a href="{{route('classes')}}" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Masuk Kelas">

                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="1.3rem" height="1.3rem" viewBox="0 0 479.754 479.754" style="enable-background:new 0 0 479.754 479.754;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M468.146,25.092H129.638c-6.411,0-11.608,5.198-11.608,11.608c0,6.413,5.197,11.61,11.608,11.61h326.899v383.133H129.638    c-6.411,0-11.608,5.196-11.608,11.611c0,6.408,5.197,11.606,11.608,11.606h338.508c6.41,0,11.607-5.198,11.607-11.606V36.701    C479.754,30.291,474.557,25.092,468.146,25.092z" fill="#FFFFFF"/>
                            <path d="M176.793,310.41c-4.535,4.536-4.535,11.883,0,16.419c2.268,2.267,5.24,3.4,8.211,3.4c2.969,0,5.938-1.135,8.206-3.4    l71.589-71.588c4.536-4.535,4.536-11.885,0-16.417l-71.589-71.598c-4.534-4.538-11.882-4.538-16.417,0    c-4.535,4.528-4.535,11.881,0,16.414l51.771,51.781H11.61C5.199,235.42,0,240.62,0,247.03c0,6.412,5.199,11.611,11.61,11.611    h216.954L176.793,310.41z" fill="#FFFFFF"/>
                          </g>
                        </g>
                        </svg>

                       </a>
                    </li>
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile', Auth::user()->username) }}">Profile</a>
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                  </ul>
              </div>
          </div>
      </nav>

      <div id="modalSesi" class="iziModal" @if (session('isError')==true) data-iziModal-subtitle="{{session('isError')}}" @endif>
        <form method="post" autocomplete="off" action="{{ route('cekSesi') }}">
          {{ csrf_field() }}
          <div class="container-fluid my-3">
            <div class="form-group">
              <input type="text" style="text-align:center" class="form-control" name="sesiKey"
              maxlength="6" minlength="6" placeholder="6 Digit Kode sesi">
              <button type="button" class="btn" hidden></button>
            </div>
          </div>
        </form>
      </div>
      <div style="height:80vh;display:flex; width:100vw">
        <center style="align-self:center; margin:0 auto">
          <h6 style="font-family:sans-serif; font-weight:300; color:gray">Loading soal...</h6>
          <img src="https://www.dundalkleisurecraft.com/wp-content/uploads/2018/01/loading-1.gif" alt="" width="50">
        </center>
      </div>
    </body>

    <script>
    $("#modalSesi").iziModal({
      title: 'Masukan Kode Sesi',
      headerColor: '#4A148C',
      top: '5%',
      focusInput:true,
      autoOpen:1,
      closeOnEscape: false,
      closeButton: false,
      icon: 'fa fa-exclamation',
      // onClosing: function(){
      //   alert('alert');
      // },
      //
      onClosed: function(){
        window.location.href = '<?= route('home'); ?>';
      },
    });
    </script>
</html>
