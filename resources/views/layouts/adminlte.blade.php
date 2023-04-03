<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/sass/app.scss')
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Include AdminLTE icons CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/all.min.css') }}">


    {{--&  for select2  --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    



</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Sign-in button with icon -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="{{ url('login') }}" class="nav-link">
                                <i class="fas fa-sign-in-alt"></i>
                                <span class="d-none d-md-inline-block ml-1">Sign In</span>
                            </a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <!-- Settings icon -->

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">Settings</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user-cog mr-2"></i> Account Settings
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-bell mr-2"></i> Notifications
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>

                    <!-- Notification icon -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>

                @endguest

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Pharmacy</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        @guest
                            <a href="#" class="d-block">Hello , Guest</a>
                            <small>Administrator</small>
                        @else
                            <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
                            <small>Administrator</small>
                        @endguest
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link">
                                <i class="nav-icon fas fa-dashboard  "></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @can('user-list')
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="nav-icon fa-solid fa-user"></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{ route('pharmacies.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-prescription-bottle-medical"></i>
                                <p>
                                    Pharmacies
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('doctors.index') }}" class="nav-link">
                                <i class=" nav-icon fa-solid fa-user-doctor"></i>
                                <p>
                                    Doctors
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('orders.index') }}" class="nav-link">
                                <i class=" nav-icon fa fa-tablet "></i>
                                <p>
                                    Orders
                                </p>
                            </a>
                        </li>
                        @can('area-all')
                            <li class="nav-item">
                                <a href="{{ url('/' . ($page = 'areas')) }}" class="nav-link">
                                    <i class=" nav-icon fa-solid fa-location-dot"></i>
                                    <p>
                                        Areas
                                    </p>
                                </a>
                            </li>
                        @endcan

                        <li class="nav-item">
                            <a href="{{ route('user-address.index') }}" class="nav-link">
                                <i class=" nav-icon fa-solid fa-location-dot"></i>
                                <p>
                                    Useraddress
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('medicines.index') }}" class="nav-link">
                                <i class=" nav-icon fa-solid fa-tablets"></i>
                                <p>
                                    Medicines
                                </p>
                            </a>
                        </li>
                        @can('user-list')
                            <li class="nav-item"><a class="nav-link" href="{{ url('/' . ($page = 'roles')) }}"><i
                                        class="nav-icon fas fa-tasks"></i>
                                    <p>
                                        Roles
                                    </p>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{ route('orders.index') }}" class="nav-link">
                                <i class=" nav-icon fa-solid fa-tablets"></i>
                                <p>
                                    Orders
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('revenues.index') }}" class="nav-link">
                                <i class=" nav-icon fa-solid fa-tablets"></i>
                                <p>
                                    Revenues
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    {{-- & our body --}}
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->

    </div>
    <!-- ./wrapper -->

    @vite('resources/js/app.js')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('dist/js/all.min.js') }}"></script>

  

    @yield('script')

</body>

</html>
