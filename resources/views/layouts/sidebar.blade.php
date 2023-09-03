    <div class="left-sidenav">
        <!-- LOGO -->
        <div class="brand">
            <a href="index" class="logo">
                <span>
                    <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                </span>
                <span>
                    <img src="{{ URL::asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                    <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <ul class="metismenu left-sidenav-menu">
                <li class="menu-label mt-0">Main</li>
                <li>
                    <a href="{{ route('home') }}"> 
                        <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}"> 
                        <i data-feather="users" class="align-self-center menu-icon"></i><span>Users</span>
                    </a>
                </li>

            </ul>

            <div class="update-msg text-center">
                <a href="javascript:void(0);" class="float-end close-btn text-black" data-dismiss="update-msg"
                    aria-label="Close" aria-hidden="true">
                    <i class="mdi mdi-close"></i>
                </a>
                <h5 class="mt-3">Mannat Themes</h5>
                <p class="mb-3">We Design and Develop Clean and High Quality Web Applications</p>
                <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm">Upgrade your plan</a>
            </div>
        </div>
    </div>
