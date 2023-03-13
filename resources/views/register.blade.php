<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome5-overrides.min.css') }}">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" id="register_user">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleName" placeholder="Full Name" name="name"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleUsername" placeholder="Username" name="username"></div>
                                </div>
                                <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email"></div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_repeat"></div>
                                </div><button class="btn btn-primary d-block btn-user w-100" id="register" type="submit">Register Account</button>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small" href="{{ url('login') }}">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#register_user').submit(function (e) { 
                e.preventDefault();
                var name = $('#exampleName').val();
                var email = $('#exampleInputEmail').val();
                var username = $('#exampleUsername').val();
                var password = $('#examplePasswordInput').val();
                // console.log(name);
                $.ajax({
                    type: "POST",
                    url: "api/users",
                    data: {
                        name: name,
                        email: email,
                        username: username,
                        password: password
                    },
                    success: function (response) {
                        alert('success to register');
                        location.href="{{ url('login') }}";
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
</body>

</html>