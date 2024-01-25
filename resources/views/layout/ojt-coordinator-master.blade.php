<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description">
    <meta content="" name="author">
    <link rel="icon" type="image/x-icon" href="{{ asset('media\PUPQCLogo-White.ico') }}" />

    @include('layout.css')

</head>

<body class="page-header-fixed page-sidebar-fixed">
    <div>
        <div class="page-wrapper">
            @include('layout.header')
            <div class="wrapper row-offcanvas row-offcanvas-left">
                <aside class="page-sidebar sidebar-offcanvas">
                    @include('layout.ojt-coordinator-sidebar')
                </aside>
                <div class="content">
                    <section class="content-header">
                        @yield('content-header')
                    </section>
                    <section class="main-content">
                        @yield('main-content')
                    </section>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')

    @include('layout.js')

    @yield('scripts')

</body>

</html>
