<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Document')</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    @yield('css')
    <style>
        #sidebar {
            width: 250px;
            position: absolute;
            top: 56px; /* Adjust for navbar height */
            left: 0;
            background-color: #343a40;
            height: calc(100% - 56px); /* Adjust for navbar height */
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        #sidebar .nav-link {
            color: #ffffff;
        }

        #main-content {
            margin-left: 250px;
            padding-top: 20px;
        }

        .custom-text-color {
            color: #0C3573 !important;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar shadow" style="background-color: #FFFFFF;">
            <div class="container-fluid">
                <a class="navbar-brand" style="color: #0C3573; font-weight: bold;">PERPUSDA</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    <div id="main-content" class="d-flex">
        <div id="sidebar" class="bg-white shadow">
            <div class="flex-shrink-0 p-3">
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed custom-text-color">
                            <i class="bi bi-house-door-fill me-2"></i>Dashboard
                        </button>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed custom-text-color" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
                            <i class="bi bi-speedometer2 me-2"></i>Master Data
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/data-siswa" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Data Siswa</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Data Buku</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed custom-text-color">
                            Peminjaman
                        </button>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed custom-text-color">
                            Pengembalian
                        </button>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed custom-text-color" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
                            <i class="bi bi-diagram-3 me-2"></i>Laporan
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="border-top my-3"></li>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-white" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                            <i class="bi bi-person-fill me-2"></i>Account
                        </button>
                        <div class="collapse" id="account-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New...</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Profile</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Settings</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Sign out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div id="isi-kontent" class="flex-grow-1">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
