<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Document</title>
</head>
<body class="project_body">
    <div class="project_button_section">
        @foreach ($events as $event)
        <div class="project">
           <a class="project_button">{{ $event->getName() }}</a>
            <ul class="project-list">
                <li> <a href="{{ route('projects.user',$event->getId()) }}">start work</a></li>
                <li><a href="{{ $event->getWebUrl() }}">download project</a></li>
            </ul>
        </div>
        @endforeach
    </div>
</body>
<script src="{{ asset('js/projects.js') }}"></script>
</html>
