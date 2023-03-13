@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Profile</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow" style="height: 308px;"><img class="rounded-circle mb-3 mt-4" src="{{asset('img/dogs/image2.jpeg')}}" width="160" height="160">
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row mb-3 d-none">
                <div class="col">
                    <div class="card textwhite bg-primary text-white shadow">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <p class="m-0">Peformance</p>
                                    <p class="m-0"><strong>65.2%</strong></p>
                                </div>
                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                            </div>
                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card textwhite bg-success text-white shadow">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <p class="m-0">Peformance</p>
                                    <p class="m-0"><strong>65.2%</strong></p>
                                </div>
                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                            </div>
                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">User Settings</p>
                        </div>
                        <div class="card-body">
                            <form id="profile_form">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="username"><strong>Username</strong></label><input class="form-control" type="text" id="username" name="username"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" name="email"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="name"><strong>Name</strong></label><input class="form-control" type="text" id="name" name="name"></div>
                                    </div>
                                    {{-- <div class="col">
                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="last_name" placeholder="Doe" name="last_name"></div>
                                    </div> --}}
                                </div>
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Update Profile</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $.ajax({
            type: "GET",
            url: 'api/users/{{Auth::user()->id}}',
            success: function (response) {
                var result = response[0];
                $('#name').val(result['name']);
                $('#email').val(result['email']);
                $('#username').val(result['username']);
            }
        });
        
        $("#profile_form").submit(function(error)
        {
            error.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var username = $('#username').val();
            var data = {
                'name': name, 
                'email': email, 
                'username': username, 
            }
            // alert(username);
            $.ajax({
                type: "PUT",
                url: "api/users/{{Auth::user()->id}}",
                data: {
                    name: name,
                    email: email,
                    username: username,
                },
                success: function (response) {
                    if (response['msg'] == 1)
                    {
                        alert("Profile has successfully updated");
                        location.href="{{ url('profile') }}";
                    }
                }
            });
        });

    });
</script>
@endsection