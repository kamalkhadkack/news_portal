<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Radio Sajha Online- Admin Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <i data-feather="settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{ Auth::user()->name }}</div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon"> <i
                                    class="far
										fa-user"></i>
                            </a>
                            Profile
                            <div class="dropdown-divider"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                    class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i>{{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <x-admin-sidebar />
            </div>
            <!-- Main Content -->
            <div class="main-content">
                {{ $slot }}
            </div>
            <footer class="main-footer">

            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="/assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="/assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>