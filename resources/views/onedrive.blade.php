<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>OneDrive</h1>
    @foreach ($events as $event)
        <a href="{{ $event->getWebUrl() }}" download>{{ $event->getName() }}</a>
    @endforeach
</body>
</html>
