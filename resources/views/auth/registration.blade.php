<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <div class="container">
        <div class="form_wrapper">
            <div class="form_container">
              <div class="title_container">
                <h2>Create New Account</h2>
              </div>
              <div class="row clearfix">
                <div class="">
                  <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input_field"> <span><i aria-hidden="true" class="fa-solid fa-user-large"></i> </span>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required />
                        @error('username')
                                <strong class="error-text" >{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required />
                        @error('email')
                                <strong class="error-text">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Password" required />
                        @error('password')
                            <strong class="error-text">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password_confirmation" placeholder="Re-type Password" required />
                        @error('password_confirmation')
                                <strong class="error-text">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="input_field select_option">
                        <select name="type">
                            <option disabled>Select type</option>
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                        <div class="select_arrow"></div>
                    </div>
                    <input class="button" type="submit" value="Register" />
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</body>
</html>
