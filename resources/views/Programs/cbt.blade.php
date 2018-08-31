<!DOCTYPE html>
<html>
    <head>
        <title>The example shows how to create a Quiz, jQuery Survey Library Example</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('/resources/assets/js/bootstrap/jquery.min.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/survey.jquery.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/iziModal.min.js') }}"></script>
        <script src="{{ asset('/resources/assets/js/iziToast.min.js') }}"></script>

        <link href="{{ asset('/resources/assets/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/survey.css') }}">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/iziModal.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/resources/assets/css/iziToast.min.css') }}">
        <style media="screen">
          h4 {
            font-family: 'Oswald', sans-serif;
          }
        </style>
    </head>
    <body>

<div class="container-fluid my-5">

  {{-- PILIH SOAL --}}
  <?php  $halaman = count(json_decode($Soal)->pages); ?>
  <div class="wrapper m-auto" id="daftar-soal" style="width:85%">
    <h4>Daftar soal :</h4>
    @for ($i=0; $i < $halaman; $i++)
      <button type="button" class="noSoal" id="pageNo" onclick="survey.currentPageNo = this.value;" value="{{ $i }}" name="button"><span>{{ $i+1 }}</span></button>
    @endfor
  </div>
        <hr/>
        @if ($wasDoing == true)
          <div id="wasDoing">

          </div>
          <script>
            $("#wasDoing").iziModal({
                headerColor: '#4b4b4b',
                title: 'Oops!',
                subtitle: 'Sepertinya kamu sudah mengisi soal ini!',
                autoOpen: 1,
                onClosed: function(){
                  window.location.href = '<?= route('sesi'); ?>';
                },
            });
          </script>
        @endif
        <div id="modalSoal" style="display:none">
          <?php
          function generateRandomString($length = 6) {
              $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $charactersLength = strlen($characters);
              $randomString = '';
              for ($i = 0; $i < $length; $i++) {
                  $randomString .= $characters[rand(0, $charactersLength - 1)];
              }
              return $randomString;
          }
           ?>
           <div class="container-fluid">
             <form action="{{ route('postHasil') }}" method="post">
               @csrf
               {{-- HIDDEN FORM --}}
               <textarea name="result" id="result" hidden rows="8" cols="80"></textarea>
               <input type="text" name="mapel_id" hidden value="{{ $MapelId }}">
               <input type="text" name="soal_id" hidden value="{{ $SoalId }}">
             <div class="form-group row">
               <div class="col-sm-12 m-auto">
                 <input type="text" value="<?= generateRandomString() ?>" readonly
                  class="form-control-plaintext h5" id="generateconfirmData" style="text-align:center" />
               </div>
             </div>
             <div class="form-group row">
               <div class="col-sm-12">
                 <input type="text"  class="form-control" style="text-align:center" maxlength="6" id="confirmData" onChange="checkPasswordMatch();" />
               </div>
             </div>
             <div class="form-group row">
               <div class="col-sm-12">
                 <button type="submit" class="btn btn-success btn-block" disabled id="btnKonfirm" name="button">Konfirmasi</button>
               </div>
               <div class="col-sm-12"><div id="cekInputMatch"></div></div>
             </div>

           </form>
           </div>
          </div>
        </div>
  <div id="surveyElement"></div>

  </button>
  <button type="button" data-iziModal-open="#modalSoal" class="btn btn-outline-dark" id="finish" name="button" style="display:none">Konfirmasi</button>
</div>

<script>
function checkPasswordMatch() {
    var data = $("#generateconfirmData").val();
    var confirmData = $("#confirmData").val();

    if (data != confirmData) {
        $("#cekInputMatch").html("Kode tidak sesuai.");
        document.getElementById("btnKonfirm").disabled = true;
      } else {
        $("#cekInputMatch").html("");
        document.getElementById("btnKonfirm").disabled = false;
      }
}

function doOnCurrentPageChanged(survey) {
    document
      .getElementById('pageNo')
       .value;
    }

Survey
    .StylesManager
    .applyTheme("default");

var json = <?= $Soal ?>;

window.survey = new Survey.Model(json);

survey
    .onComplete
    .add(function (result) {
      document.getElementById("result").innerHTML = JSON.stringify(result.data);
      survey.completedHtml = "{correctedAnswers} benar dari {questionCount} soal";
      $(document).ready(function () {
         $("#textNewPassword, #txtConfirmPassword").keyup(checkPasswordMatch);
      });
        document.getElementById("daftar-soal").style.display = "none";
        $("#modalSoal").iziModal({
            headerColor: '#4b4b4b',
            title: 'Konfirmasi Soal',
            subtitle: 'Copy kode dibawah ke kotak input lalu Konfirmasi',
            autoOpen: 1,
            top: '15%,',
            closeOnEscape: false,
            closeButton: false,
            onClosed: function(){
              $("#modalSoal").iziModal({
                  headerColor: '#4b4b4b',
                  subtitle: 'Copy kode dibawah ke kotak input lalu Konfirmasi',
                  title: 'Konfirmasi jangan close!',
                  autoOpen: 1,
                  top: '20%,',
                  closeOnEscape: false,
                  closeButton: false,
              });
            },
        });
    });
$("#surveyElement").Survey({model: survey, onCurrentPageChanged: doOnCurrentPageChanged});

doOnCurrentPageChanged(survey);
survey.showTitle = false;
</script>
    </body>
</html>
