<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PUPQC OJT Management System</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('media\PUPQCLogo-White.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/auth/style.css') }}">
</head>

<body>

    <div class="login-container">
        <div style="width:70%;">
            <img id="pylon-image" src="{{ asset('media/PupPylon.png') }}" alt="pylon">
        </div>
        <div id="main-login-form" style="width:30%;">
            <img id="pup-logo" src="{{ asset('media/puplogo.png') }}" alt="pup-logo">
            <h1 id="system-names">OJT Management System</h1>
            <p id="pup-name">Polytechnic University of the Philippines <br>Quezon City Branch</p>
            <div class="btn-container">
                <p id="login-paragraph">Login as:</p>
                <a href="{{ route('student-login') }}" type="button" class="btn btn-primary no-style">OJT Student</a>
                <a href="{{ route('ojt-adviser-login') }}" type="button" class="btn btn-primary no-style">OJT
                    Adviser</a>
                <a href="{{ route('ojt-coordinator-login') }}" type="button" class="btn btn-primary no-style">OJT
                    Coordinator</a>
                <a type="button" class="btn btn-primary no-style">Company</a>
            </div>
            <div class="footer">
                <p id="footer-text">By using this service, you understood and agree to the<br> PUP Online Services <a
                        href="#">Terms of Use</a> and <a href="#">Privacy Statement</a> </p>
            </div>
        </div>
    </div>

</body>

</html>
