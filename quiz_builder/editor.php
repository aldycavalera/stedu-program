﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>SurveyJS Editor</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript" charset="utf-8"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.1/knockout-debug.js"></script>
    <script src="https://unpkg.com/survey-knockout"></script>
    <link rel="stylesheet" href="https://unpkg.com/survey-knockout/survey.css" />

    <script src="https://unpkg.com/surveyjs-editor"></script>
    <link rel="stylesheet" href="https://unpkg.com/surveyjs-editor/surveyeditor.css" />
    <link rel="stylesheet" href="./index.css" />
</head>

<body>
    <a class="fork_me_on_github" href="https://github.com/surveyjs/surveyjs-php" target="_blank">
        <img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67"
            alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png">
    </a>
    <div class="survey-page-header">
        <div class="sv_main survey-page-header-content">
            <button onclick="window.location = '/'">&lt&nbspBack</button>
        </div>
    </div>
    <div class="sv_main sv_frame sv_default_css">
        <div class="sv_custom_header">
        </div>
        <div class="sv_container">
            <div class="sv_header">
                <h3>
                    <span id="sjs_editor_title_edit" class="editor_title_edit" style="display: none;">
                        <input style="border-top: none; border-left: none; border-right: none; outline: none;" />
                        <span class="btn btn-success" onclick="postEdit()" style="border-radius: 2px; margin-top: -8px; background-color: #1ab394; border-color: #1ab394;">Update</span>
                        <span class="btn btn-warning" onclick="cancelEdit()" style="border-radius: 2px; margin-top: -8px;">Cancel</span>
                    </span>
                    <span id="sjs_editor_title_show">
                        <span style="padding-top: 1px; height: 39px; display: inline-block;"></span>
                        <span class="edit-survey-name" onclick="startEdit()" title="Change Name">
                            <img class="edit-icon" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0iIzFBQjM5NCIgZD0iTTE5LDRsLTksOWw0LDRsOS05TDE5LDR6Ii8+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiMxQUIzOTQiIGQ9Ik04LDE1djRoNEw4LDE1eiIvPjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBmaWxsPSIjMUFCMzk0IiBkPSJNMSwxN3YyaDR2LTJIMXoiLz48L2c+PC9zdmc+"
                                style="width:24px; height:24px; margin-top: -5px;" />
                        </span>
                    </span>
                </h3>
            </div>
            <div class="sv_body">
                <div id="editor"></div>
            </div>
            <form action="h" method="post">
              <textarea name="soal" id="json" rows="8" cols="80"></textarea>
            </form>
        </div>
    </div>

    <script src="./editor.js"></script>
    <script>

    </script>
</body>

</html>
