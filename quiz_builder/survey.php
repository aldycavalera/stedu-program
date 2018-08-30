<!DOCTYPE html>
<html>

<head>
    <title>Welcome to SurveyJS</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
    <script src="https://unpkg.com/survey-knockout"></script>
    <link rel="stylesheet" href="https://unpkg.com/survey-knockout/survey.css" />
    <link rel="stylesheet" href="./index.css" />
</head>

<body>
    <div class="survey-page-header">
        <div class="sv_main survey-page-header-content">
            <button onclick="window.location = '/'">&lt&nbspBack</button>
        </div>
    </div>
    <div id="surveyElement">
    </div>
    <div id="json">
    </div>

    <script>
    function getParams() {
      var url = window.location.href
        .slice(window.location.href.indexOf("?") + 1)
        .split("&");
      var result = {};
      url.forEach(function(item) {
        var param = item.split("=");
        result[param[0]] = param[1];
      });
      return result;
    }

    function init() {
      // Survey.dxSurveyService.serviceUrl = "http://localhost:8000";
      //
      // var css = {
      //   root: "sv_main sv_frame sv_default_css"
      // };
      //
      var surveyId = decodeURI(getParams()["id"]);
      // var model = new Survey.Model({ surveyId: surveyId, surveyPostId: surveyId });
      // model.css = css;
      // window.survey = model;
      // model.render("surveyElement");

      // Load survey by id from url
      var xhr = new XMLHttpRequest();
      xhr.open('GET', "http://localhost:8000" + '/getSurvey?surveyId=' + surveyId);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function () {
          var result = JSON.parse(xhr.response);
          if(!!result) {
              var surveyModel = new Survey.Model(result);
              window.survey = surveyModel;
              ko.cleanNode(document.getElementById("surveyElement"));
              document.getElementById("surveyElement").innerText = "";
              surveyModel.render("surveyElement");
          }
      };

      xhr.send();
    }

    init();

    </script>
</body>

</html>
