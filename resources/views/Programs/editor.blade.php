<!DOCTYPE html>
<html>
    <head>
        <title>The example shows how to create a Quiz, jQuery Survey Library Example</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('/resources/assets/js/bootstrap/jquery.min.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/bootstrap/bootstrap4.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/iziModal.min.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/survey.jquery.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/knockout.min.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/survey.ko.min.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/surveyeditor.min.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/iziToast.min.js') }}"></script>

        <link href="{{ asset('/resources/assets/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/iziModal.min.css') }}">
        <link href="{{ asset('/resources/assets/css/surveyeditor.css') }}" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/survey.css') }}">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/iziToast.min.css') }}">
        <style>
          .svd_commercial_container {
            display: none !important;
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


<div class="container-fluid my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Modal structure -->
        <div id="showJSON">
          <textarea name="soalJSON" id="jsonDat" rows="8" cols="80"
          style="background:transparent;border:none;width:100%"
          disabled>
          </textarea>
        </div>

        {{-- DATABASE SEND --}}
        <div class="container-fluid soal-data my-5" style="border:1px dashed #4b4b4b; position:relative">
          <center style="position: absolute;
                top: 0;
                left: 50%;
                transform: translate(-50%, -50%);
                background: #F5F8FA;
                padding: 1rem;"><h2>DATA SOAL</h2></center>
          <form class="" id="dataSoal" action="{{ route('updateSoal') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="mapel_id" value="{{ $MapelId }}">
            <input type="hidden" name="soal_id" value="{{ $SoalId }}">
            <div class="form-group row">
              <label for="soalName" class="col-sm-2 col-form-label">Nama soal</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="soalName" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="showJSON" class="col-sm-2 col-form-label">Data soal</label>
              <div class="col-sm-10">
                <!-- Trigger to open Modal -->
                <button type="button" data-iziModal-open="#showJSON" class="trigger btn-none">
                  Data sedang direkam <i class="fa fa-spinner fa-spin"></i>
                </button>
              </div>
            </div>
            <div class="form-group row">
              <label for="toggler" class="col-sm-2 col-form-label">Soal Editor</label>
              <div class="col-sm-10">
                <!-- Toggle editor -->
                <label class="switch" id="toggler">
                  <input type="checkbox" checked onclick="showEditor()">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="form-group row">
              <label for="status" class="col-sm-2 col-form-label">Status publikasi soal</label>
              <div class="col-sm-10">
                <select class="form-control form-control-md" id="status" name="status">
                  <option value="nonactive">Pilih...</option>
                  <option value="active">Aktif</option>
                  <option value="nonactive">Non-aktif</option>
                </select>
              </div>
            </div>

            <textarea name="soalJSON" id="editorJSON" rows="8" cols="80"
            style="background:transparent;border:none;width:100%"
            hidden>
            </textarea>
            <a href="#!" onclick="openSesi()">Pilih sesi</a>
            <button type="submit" onclick="ifSuccess()" id="submit" class="btn btn-submit my-3 btn-lg btn-block">Submit data</button>
            <div id="modal-alert"></div>
            <span style="color:gray">
              <i class="fa fa-info"></i> <strong class="h-5">Informasi</strong>
              <p>Setelah selesai membuat soal, pastikan untuk membuat Sesi dan meregenerate <mark>Sesi Key</mark>, siswa akan
              diminta <mark>Sesi Key</mark> pada saat akan mengerjakan Soal.</p>
            </span>
          </form>
        </div>

      </div>
    </div>
  </div>
  <div id="editorElement"></div>
</div>



<script>
function ifSuccess() {
  iziToast.success({
      title: 'Tersimpan.',
      message: 'Data tersimpan di database!',
  });
}
function openSesi() {
  iziToast.question({
      timeout: 20000,
      close: false,
      overlay: true,
      displayMode: 'once',
      id: 'question',
      zindex: 999,
      title: 'Hey',
      message: 'Are you sure about that?',
      position: 'center',
      drag: true,
      message:'',
      onClosing: function(instance, toast, closedBy){
          console.info('Closing | closedBy: ' + closedBy);
      },
      onClosed: function(instance, toast, closedBy){
          console.info('Closed | closedBy: ' + closedBy);
      }
  });
}
$('#dataSoal').submit(function(e) {
    e.preventDefault();
    $.post('<?= route('updateSoal') ?>', $('#dataSoal').serialize());
});

$(document).on('click', '.open-alert', function (event) {
  event.preventDefault();
  $('#modal-alert').iziModal('open');
});
$("#refresh").click(function() {
 $("#editorJSON").load("#editorJSON");
});
</script>
<script>
  function showEditor() {
    var x = document.getElementById("editorElement");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
  }
</script>
<script>
  var storageName = "soal-<?= $Mapel.'-'.$Soal->id ?>";
  var editorOptions = { };
  //Create the Survey Editor with the default options
  editor = new SurveyEditor.SurveyEditor("editorElement", editorOptions);
  //Show state in the toolbar, for example: Saving/Saved/Loading etc.
  editor.showState = true;
  //Call saveSurveyFunc automatically on changing in Editor, adding/removing/editing questions/pages etc.
  //The default value is false. A use must click the "Save" button, that will be displayed in the toolbar
  editor.isAutoSave = true;
  //Callback function, Editor calls it when you must save changes.
  editor.saveSurveyFunc = function(saveNo, callback) {
    window.localStorage.setItem(storageName, editor.text);
    //Load the survey definition from a storage
    document.getElementById("jsonDat").innerHTML = window.localStorage.getItem(storageName);
    document.getElementById("editorJSON").innerHTML = window.localStorage.getItem(storageName);
    !!callback && callback(saveNo, true);
};
document.getElementById("editorJSON").innerHTML = window.localStorage.getItem(storageName);
document.getElementById("soalName").value = storageName;
editor.text = window.localStorage.getItem(storageName) || "";
</script>

<script>
$("#showJSON").iziModal({
  title: 'JSON data, Untuk keperluan Developing saja!',
  subtitle: storageName,
  fullscreen: true,
  headerColor: '#4B4B4B',
  width: '50%',
  icon: 'fa fa-file-code' // 'fa fa-codefork' | fa-code | fa-file-code
});
</script>

    </body>
</html>
