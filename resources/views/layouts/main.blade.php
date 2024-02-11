@include('layouts.head')


<body>
    @include('sweetalert::alert')
    <div id="layout-wrapper">
        @include('layouts.header')
        <div class="vertical-menu">
            @include('layouts.navbar')
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                <i class="bx bx-menu align-middle"></i>
            </button>
            @include('layouts.sidebar')
        </div>
        <!-- Left Sidebar End -->
        <header class="ishorizontal-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="/" class="logo logo">
                            <span class="logo-sm">
                                <img src="/assets/images/logo-1.svg" alt="" height="70">
                            </span>
                            <span class="logo-lg">
                                <img src="/assets/images/logo-1.svg" alt="" height="70">
                            </span>
                        </a>

                        <a href="/" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="/assets/images/logo-1.svg" alt="" height="28">
                            </span>
                            <span class="logo-lg">
                                <img src="/assets/images/logo-1.svg" alt="" height="28">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item"
                        data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="bx bx-menu align-middle"></i>
                    </button>

                    <!-- start page title -->
                    <div class="page-title-box align-self-center d-none d-md-block">
                        <h4 class="page-title mb-0">Beranda</h4>
                    </div>
                    <!-- end page title -->

                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item user text-start d-flex align-items-center"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="/assets/images/users/avatar-3.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-2 fw-medium font-size-15">Sholeh
                                Rachmatullah</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="p-3 border-bottom">
                                <h6 class="mb-0">Sholeh Rachmatullah</h6>
                                <p class="mb-0 font-size-11 text-muted">martin.gurley@email.com</p>
                            </div>
                            <a class="dropdown-item" href="contacts-profile.html"><i
                                    class="mdi mdi-account-circle text-muted font-size-16 align-middle me-2"></i> <span
                                    class="align-middle">Profile</span></a>
                            <a class="dropdown-item" href="apps-chat.html"><i
                                    class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-2"></i>
                                <span class="align-middle">Messages</span></a>
                            <a class="dropdown-item" href="pages-faqs.html"><i
                                    class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-2"></i> <span
                                    class="align-middle">Help</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                    class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-2"></i> <span
                                    class="align-middle me-3">Settings</span><span
                                    class="badge bg-success-subtle text-success  ms-auto">New</span></a>
                            <a class="dropdown-item" href="auth-lock-screen.html"><i
                                    class="mdi mdi-lock text-muted font-size-16 align-middle me-2"></i> <span
                                    class="align-middle">Lock
                                    screen</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="auth-logout.html"><i
                                    class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span
                                    class="align-middle">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-home-alt icon nav-icon"></i>
                                        <span data-key="t-dashboards">Dashboards</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                        <a href="index.html" class="dropdown-item" data-key="t-ecommerce">Ecommerce</a>
                                        <a href="dashboard-sales.html" class="dropdown-item"
                                            data-key="t-sales">Sales</a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('layouts.footer')

</body>

</html>