    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SIPIKA</title>


        <link rel="shortcut icon" href="{{ asset('theme/assets/compiled/svg/logo.svg') }}" type="image/x-icon" />
        <link rel="shortcut icon"
            href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
            type="image/png" />

        <link rel="stylesheet"
            href="{{ asset('theme/assets/extensions/choices.js/public/assets/styles/choices.css') }}" />
        <link rel="stylesheet" href="{{ asset('theme/assets/compiled/css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('theme/assets/compiled/css/app-dark.css') }}" />
        <link rel="stylesheet" href="{{ asset('theme/assets/extensions/flatpickr/flatpickr.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('theme/assets/extensions/flatpickr/flatpickr.css') }}" />
        <link rel="stylesheet" href="{{ asset('theme/assets/extensions/sweetalert2/sweetalert2.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('theme/assets/compiled/css/iconly.css') }}" />

        <link rel="stylesheet"
            href="{{ asset('theme/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('theme/assets/compiled/css/table-datatable-jquery.css') }}" />

    </head>

    <body>
        <script src="{{ asset('theme/assets/static/js/initTheme.js') }}"></script>
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('theme/assets/compiled/svg/logo.svg') }}" alt="Logo"
                                    style="width: 100px; height: auto;" />
                            </a>
                        </div>
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer" />
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->is('/') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        @if (auth()->user()->role == 'Admin')
                            <li
                                class="sidebar-item has-sub {{ request()->is('datapegawai') || request()->is('datajabatan') || request()->is('datapengguna*') ? 'active' : '' }}">
                                <a href="#" class="sidebar-link">
                                    <i class="bi bi-stack"></i>
                                    <span>Data Master</span>
                                </a>
                                <ul class="submenu">
                                    <li class="submenu-item {{ request()->is('datapegawai') ? 'active' : '' }}">
                                        <a href="{{ route('datapegawai') }}" class="submenu-link">Data Pegawai</a>
                                    </li>
                                    <li class="submenu-item {{ request()->is('datajabatan') ? 'active' : '' }}">
                                        <a href="{{ route('datajabatan') }}" class="submenu-link">Data Jabatan</a>
                                    </li>
                                    <li
                                        class="submenu-item has-sub {{ request()->is('datapengguna*') ? 'active' : '' }}">
                                        <a href="#" class="submenu-link">Data Pengguna</a>
                                        <ul class="submenu submenu-level-2">
                                            <li
                                                class="submenu-item {{ request()->is('datapenggunaadmin') ? 'active' : '' }}">
                                                <a href=" {{ route('datapenggunaadmin') }}"
                                                    class="submenu-link">Admin</a>
                                            </li>
                                            <li
                                                class="submenu-item {{ request()->is('datapenggunapimpinan') ? 'active' : '' }}">
                                                <a href="{{ route('datapenggunapimpinan') }}"
                                                    class="submenu-link">Pimpinan</a>
                                            </li>
                                            <li
                                                class="submenu-item {{ request()->is('datapenggunapegawai') ? 'active' : '' }}">
                                                <a href=" {{ route('datapenggunapegawai') }}"
                                                    class="submenu-link">Pegawai</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @php
                            $role = auth()->user()->role; // Mendapatkan role pengguna yang sedang login
                        @endphp

                        <li class="sidebar-item {{ request()->is('laporan') ? 'active' : '' }}">
                            <a href="{{ route('laporan') }}" class="sidebar-link">
                                <i class="bi bi-life-preserver"></i>
                                <span>
                                    @if ($role == 'Pegawai')
                                        Riwayat Presensi
                                    @else
                                        Laporan
                                    @endif
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class="layout-navbar navbar-fixed">
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex align-items-center">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600">{{ Auth::user()->pegawai->nama_pegawai }}</h6>
                                        <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->role }}</p>
                                    </div>
                                    <div class="avatar avatar-md ms-2">
                                        <img src="{{ asset('foto/' . (Auth::user()->pegawai->foto ?? 'default.jpg')) }}"
                                            class="rounded-circle" height="40" width="40"
                                            alt="Foto Pengguna">
                                    </div>
                                </div>
                            </a>

                            <div class="user-img d-flex align-items-center">
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ Auth::user()->pegawai->nama_pegawai }}!
                                        </h6>
                                    </li>

                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <form id="logout-form" action="{{ route('logoutProcess') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </nav>
            </header>

            {{-- END NAVBAR --}}

            {{-- START CONTENT  --}}
            <div id="main-content">
                @yield('content')
            </div>
            {{-- END CONTENT --}}

            {{-- START FOOTER --}}
            {{-- @extends('komponen.footer') --}}
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ date('Y') }} &copy; SIPIKA</p>
                    </div>
                    <div class="float-end">
                        <p>
                            Crafted with
                            <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="#">Moj</a>
                        </p>
                    </div>
                </div>
            </footer>
            {{-- END FOOTER --}}
        </div>
        <script src="{{ asset('theme/assets/static/js/components/dark.js') }}"></script>
        <script src="{{ asset('theme/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

        <script src="{{ asset('theme/assets/compiled/js/app.js') }}"></script>

        {{-- DATA TABLES --}}
        <script src="{{ asset('theme/assets/extensions/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('theme/assets/extensions/flatpickr/flatpickr.js') }}"></script>
        <script src="{{ asset('theme/assets/static/js/pages/date-picker.js') }}"></script>

        <script src="{{ asset('theme/assets/extensions/jquery/jquery.min.js') }}"></script>
        <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
        <script src="{{ asset('theme/assets/static/js/pages/datatables.js') }}"></script>

        <script src="{{ asset('theme/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
        <script src="{{ asset('theme/assets/static/js/pages/form-element-select.js') }}"></script>



        {{-- <script
        src="{{ asset('theme/assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('theme/assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
    </script>
    <script src="{{ asset('theme/assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}">
    </script>
    <script
        src="{{ asset('theme/assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('theme/assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}">
    </script>
    <script
        src="{{ asset('theme/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('theme/assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}">
    </script> --}}
        {{-- <script src="{{ asset('theme/assets/extensions/filepond/filepond.js') }}"></script> --}}


        <script src="{{ asset('theme/assets/static/js/components/dark.js') }}"></script>
        <script src="{{ asset('theme/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

        <script src="{{ 'assets/compiled/js/app.js' }}"></script>
        {{-- CHARTJS --}}
        <script src="{{ asset('theme/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('theme/assets/static/js/pages/dashboard.js') }}"></script>

        {{-- SWEET ALERT --}}
        <script src="{{ asset('theme/assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>

        <script src="{{ asset('theme/assets/static/js/pages/sweetalert2.js') }}"></script>

        <script src="{{ asset('theme/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
        <script src="{{ asset('theme/assets/static/js/pages/form-element-select.js') }}"></script>

        <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>

    </body>

    </html>
