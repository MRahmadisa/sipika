@extends('template')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Pimpinan')
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3> Statistik Pegawai</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Dashboard
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h6 class="text-muted font-semibold">Jumlah Kehadiran Hari ini</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jumlahKehadiranHariIni }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h6 class="text-muted font-semibold">Jumlah Kehadiran Tepat Waktu</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jumlahKehadiranTepatWaktu }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h6 class="text-muted font-semibold">Jumlah Pegawai</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jumlahPegawai }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Presensi Pegawai</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="kehadiranChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->role == 'Pegawai')
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3 class="mb-0">Selamat Datang, {{ Auth::user()->pegawai->nama_pegawai }}!</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Dashboard
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Presensi Hari Ini </h5>
                            <h6 class="mb-0 text-gray-600">{{ \Carbon\Carbon::now()->format('d F Y') }}</h6>
                            <br>

                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            @php
                                $idPegawai = Auth::user()->id_pegawai;
                                $presensiHariIni = App\Models\Presensi::where('id_pegawai', $idPegawai)
                                    ->whereDate('presensi_masuk', \Carbon\Carbon::today())
                                    ->first();
                            @endphp

                            @if ($presensiHariIni)
                                @if ($presensiHariIni->presensi_pulang)
                                    <p class="mb-0">Anda sudah melakukan presensi pulang pada:
                                        {{ $presensiHariIni->presensi_pulang }}</p>
                                @else
                                    <form action="{{ route('presensiPulang') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-3">Presensi Pulang</button>
                                    </form>
                                @endif
                            @else
                                <form action="{{ route('presensiMasuk') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success mt-3">Presensi Masuk</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('dashboard.kehadiranPerBulan') }}',
                method: 'GET',
                success: function(data) {
                    var ctx = document.getElementById('kehadiranChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                'Juli', 'Agustus', 'September', 'Oktober', 'November',
                                'Desember'
                            ],
                            datasets: [{
                                label: 'Jumlah Kehadiran',
                                data: Object.values(data),
                                backgroundColor: 'rgba(81, 115, 189, 1)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>

@endsection
