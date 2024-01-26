<header class="header">
    <div class="logo"><a href="{{ route('studentDashboard') }}" class="logo-text">OJT MGMT</a><a
            href="#" data-toggle="offcanvas" class="sidebar-toggle pull-right"><i
                class="fa fa-bars"></i></a></div>
    <nav role="navigation" class="navbar navbar-static-top">
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-user menu-user"><a href="#" data-toggle="dropdown"
                        class="dropdown-toggle"><span class="hidden-xs"></span>&nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="page_user_profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="email_inbox.html"><i class="icon-envelope-open"></i>My Inbox<span
                                    class="badge badge-primary">6</span></a></li>
                        <li><a href="{{ route('logout') }}"><i class="icon-key"></i>Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
