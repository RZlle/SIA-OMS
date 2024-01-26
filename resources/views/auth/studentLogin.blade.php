<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PUPQC OJT Management System</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('media\PUPQCLogo-White.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/auth/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('global/plugins/ionicons/css/ionicons.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('global/plugins/simple-line-icons/simple-line-icons.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css">

</head>

<style>
    /* Add this CSS to your stylesheet */
    .swal2-container {
        max-width: 600px;
        /* Adjust the maximum width as needed */
        margin: 0 auto;
        /* Center the modal horizontally */
    }

    .swal2-popup {
        max-height: 80vh !important;
        overflow-y: auto !important;
    }
</style>

<body>

    <div class="login-container">
        <div style="width:70%;">
            <img id="pylon-image" src="{{ asset('media/PupPylon.png') }}" alt="pylon">
        </div>
        <div id="main-login-form" style="width:30%;">

            <img id="pup-logo" src="{{ asset('media/puplogo.png') }}" alt="pup-logo">
            <h3 id="system-names"><strong>OJT Management System</strong><br> <span style="color: #800000">OJT Task
                    Management Module</span></h3>
            <p id="pup-name"> Polytechnic University of the Philippines <br><span style="color: #800000">Quezon City
                    Branch</span></p>
            <div class="btn-container-student">
                <p style="margin-bottom: 1em; font-size: 12pt;">Login as <strong>Student</strong></p>
                <form id="login-form" name="login-form" style="width: 100%;" action="">
                    <input class="form-control" type="text" name="username" id="student-username"
                        placeholder="Student Number" autocomplete="on">
                    <input class="form-control" type="password" name="password" id="student-password"
                        placeholder="Password" autocomplete="on">
                </form>
                <button id="student-sign-in" class="btn btn-primary">Sign In</button>
                <span id="error"></span>
                <div id="back-arrow">
                    <a id="back-btn"><i class="fa fa-arrow-left fa-lg"></i> <span><strong>Back</strong></span></a>
                </div>
                <div style="margin-top: 1em;">
                    <a class="no-style" style="color: #800000" href="{{ route('forgot-password') }}"><strong>Forgot
                            Password?</strong></a>
                </div>
            </div>
            <div class="footer">
                <p id="footer-text">By using this service, you understood and agree to the<br> PUP Online Services <a
                        href="#">Terms of Use</a> and <a href="#">Privacy Statement</a> </p>
            </div>
        </div>
    </div>

    @include('layout.js')

    <script>
        $(document).ready(function() {


            $('#login-form').validate({
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    username: {
                        required: "Student number is required"
                    },
                    password: {
                        required: "Password is required"
                    }
                }
            });


            $('#student-sign-in').click(function() {

                if ($('#login-form').valid()) {
                    axios.get('http://127.0.0.1:8000/student/login', {
                            'UserName': $('#student-username').val(),
                            'Password': $('#student-password').val(),
                        })
                        .then(response => {
                            if (response.data.status && response.data.type == "student") {

                                Swal.fire({
                                    title: "Good job!",
                                    text: "Login successful!",
                                    icon: "success",
                                    confirmButtonText: 'Okay'
                                }).then((result) => {
                                    if (result.isConfirmed) {

                                        window.location.href = '/student/dashboard';

                                    }
                                });


                            } else {}
                        })
                        .catch(error => {
                            console.log('lods');
                            console.log(error);
                        })
                } else {
                    console.log('Form is not valid.');
                }

            });

            $('#back-btn').click(function() {
                window.location.href = '/';
            });
        });
    </script>
</body>

</html>
