<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Document</title>
</head>
<body class="project_body">
    <div class="project_button_section">
        @foreach ($events as $event)
            <div class="project">
                <a class="project_button" id="{{ $event->getId() }}" data-id="{{ $loop->iteration }}" >{{ $event->getName() }}</a>
                {{-- <ul class="project-list">
                    <li> <a href="{{ route('projects.user',$event->getId()) }}">start work</a></li>
                    <li><a href="{{ $event->getWebUrl() }}">download project</a></li>
                </ul> --}}
            </div>
            @auth('admin')
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">  </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            {{QrCode::generate($event->getId())}}
                        </div>
                        <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel {{ $loop->iteration }}</button>
                        <button type="button" class="btn btn-primary modal-btn">continue</button> --}}
                        </div>
                    </div>
                    </div>
                </div>
            @endauth

            @endforeach
    </div>
    <div id="app">
        @auth('web')
            <qrcode-scan projects='{{ json_encode($projects) }}'></qrcode-scan>
        @endauth
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    let is_admin = '{{ auth()->user()->isAdmin() }}';
</script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/projects.js') }}"></script>
</html>
