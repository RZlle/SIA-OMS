<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('media\PUPQCLogo-White.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/auth/style.css') }}">
    <title>PUPQC OMS - Forgot Password</title>
</head>
<body>

<div class="login-container">
    <div id="right" style="width: 60%;">
        <img style="width: 25%;" src="{{ asset('media/puplogo.png') }}" alt="pup-logo">
        <h3 style="color: #800000">#######</h3>
        <p id="pup-name"> Polytechnic University of the Philippines <br><span style="color: #800000">Quezon City Branch</span></p>
    </div>
    <div id="left" style="width: 40%; height: 100%; overflow: hidden;">
        <div style="width: 70%;" class="card flex-column mx-3">
            <div class="card-body flex-column gap-1">
                <p>Forgot Password?</p>
                <input class="form-control-1 mx-3" type="text" placeholder="Email Address">
                <button class="btn btn-pup">Request New Password</button>
                <a id="login-again-btn" style="color: #800000; text-decoration: none; margin-top: 0.5em;"> Login </a>
            </div>
        </div>
        <div style="justify-self:baseline; width: 40%; font-size: 9pt; color: #800000; background-color: ghostwhite !important;">
            Polytechnic University of the Philippines | Terms of Use | Privacy Statement| Version 09.27.23.A
        </div>
    </div>
</div>
<script src="{{ asset('global/js/jquery.js') }}"></script>
<script src="{{ asset('global/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('global/js/jquery-ui.js') }}"></script>
<script>
    $(document).ready(function (){
        $('#login-again-btn').click( function() {
            window.history.back();
        });
    });
</script>
</body>
</html>
