<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="{{ asset('image/icon.png') }}">
    <title>SIPKA</title>

    <!-- Soft UI CSS -->
    <link id="pagestyle" href="{{ asset('softui/assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />

    <style>
        /* supaya konten tidak nempel */
        .content-wrapper {
            padding: 20px;
        }

        .navbar-brand-img {            width: 45px;
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">

    <!-- SIDEBAR -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-white" id="sidenav-main">

        <div class="sidenav-header">
            <a class="navbar-brand m-0" href="#">
                <img src="{{ asset('image/icon.png') }}" class="navbar-brand-img" alt="main_logo">
                <span class="ms-1 font-weight-bold">SIPKA</span>
            </a>
        </div>

        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('backend.beranda') }}">
                        <i class="ni ni-shop text-primary"></i>
                        <span class="nav-link-text ms-2">Beranda</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('backend.user.index') }}">
                        <i class="ni ni-single-02 text-warning"></i>
                        <span class="nav-link-text ms-2">User</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('laporan.index') }}">
                        <i class="ni ni-folder-17 text-info"></i>
                        <span class="nav-link-text ms-2">Laporan Kekerasan</span>
                    </a>
                </li>

            </ul>
        </div>

    </aside>
    <!-- END SIDEBAR -->

    <!-- MAIN CONTENT -->
    <main class="main-content position-relative border-radius-lg">

        <!-- NAVBAR -->
        <nav class="navbar navbar-main navbar-expand shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">

                <h6 class="font-weight-bolder mb-0">SIPKA Dashboard</h6>

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownProfile" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <img src="{{ asset('image/icon.png') }}" class="avatar avatar-sm">
                            <span class="ms-2">{{ Auth::user()->nama }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <a class="dropdown-item" href="#!">Profil</a>
                            </li>

                            <li>
                                <form action="{{ route('backend.logout') }}" method="POST" class="dropdown-item p-0 m-0">
                                    @csrf
                                    <button class="btn btn-link w-100 text-start">Keluar</button>
                                </form>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <div class="content-wrapper">
            @yield('content')
        </div>

    </main>

    <!-- Soft UI JS -->
    <script src="{{ asset('softui/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('softui/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('softui/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('softui/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>

</body>

</html>