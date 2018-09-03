<!DOCTYPE html>
<html>
    <head>
        <title>CBT - Edit soal-<?= $Mapel.'-'.$Soal->id ?></title>
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
$('#dataSoal').submit(function(e) {
    e.preventDefault();
    $.post('<?= route('updateSoal') ?>', $('#dataSoal').serialize());
});

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
