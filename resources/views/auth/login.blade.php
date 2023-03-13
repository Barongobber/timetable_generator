<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Timetable</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome5-overrides.min.css') }}">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col offset-xl-0">
                                <div class="p-5">
                                    @if($errors->any())
                                        <script>alert("login is failed")</script>
                                    @endif
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome!</h4>
                                    </div>
                                    <form class="user" id="login_form">
                                        {{-- @csrf --}}
                                        <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <div class="mb-3"></div><button class="btn btn-primary d-block btn-user w-100" id="login_button" type="submit">Login</button>
                                        <hr>
                                    </form>
                                    <div class="text-center"></div>
                                    <div class="text-center"><a class="small" href="{{ url('register') }}">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#login_form').submit(function (e) { 
                e.preventDefault();
                var email = $('#exampleInputEmail').val();
                var password = $('#exampleInputPassword').val();
                $.ajax({
                    type: "POST",
                    url: "api/users/"+email,
                    success: function (response) {
                        var result = response[0];
                        // console.log(response);
                        $.ajax({
                            type: "POST",
                            url: "check_user",
                            data: {
                                email: result['email'],
                                password: password,
                            },
                            success: function (response) {
                                if (response == 1)
                                {
                                    alert('login success');
                                    location.href="{{ url('home') }}"
                                }
                                else 
                                {
                                    alert('login failed');
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>