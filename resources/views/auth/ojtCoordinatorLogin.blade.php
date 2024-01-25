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

</head>

<body>

    <div class="login-container">
        <div style="width:70%;">
            <img id="pylon-image" src="{{ asset('media/PupPylon.png') }}" alt="pylon">
        </div>
        <div id="main-login-form" style="width:30%;">
            <img id="pup-logo" src="{{ asset('media/puplogo.png') }}" alt="pup-logo">
            <h3 id="system-names"><strong>OJT Management System</strong><br> <span style="color: #800000">Company Management Module</span></h3>
            <p id="pup-name"> Polytechnic University of the Philippines <br><span style="color: #800000">Quezon City
                    Branch</span></p>
            <div class="btn-container-student">
                <p style="margin-bottom: 1em; font-size: 12pt;">Login as <strong>OJT Coordinator</strong></p>
                <input class="form-control" type="text" name="username" id="ojt-coor-username"
                    placeholder="Webmail" autocomplete="on">
                <input class="form-control" type="password" name="password" id="ojt-coor-password" placeholder="Password"
                    autocomplete="on">
                <button id="ojt-coor-sign-in" class="btn btn-primary">Sign In</button>
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
    <script src="{{ asset('global/js/jquery.js') }}"></script>
    <script src="{{ asset('global/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('global/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/axios/axios.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#ojt-coor-sign-in').click(function() {
                axios.post('http://sms-oms.test/api/auth/login', {
                    'UserName': $('#ojt-coor-username').val(),
                    'Password': $('#ojt-coor-password').val(),
                })
                .then(response => {
                    if(response.data.status && response.data.Usertype == "COOR") {
                        alert('Login Successful!');
                        window.location.href = '/ojt-coordinator/dashboard';
                    } else {
                        alert('Login failed' + response.data.Usertype);
                    }
                })
                .catch(error => {
                    console.error(error);
                })
            });

            $('#back-btn').click(function () {
                window.location.href = '/';
            });

        });
    </script>
</body>

</html>
