<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Document</title>
</head>
<body class="project_body">
    <div class="project_button_section">
        <div class="project">
            <a class="project_button" href="{{ route('projects.user',$project->project_id) }}" >start work</a>
            <a class="project_button" href="{{ $project->webUrl }}" >download files</a>
        </div>
    </div>
</body>
<script src="{{ asset('js/projects.js') }}"></script>
</html>
