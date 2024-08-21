@extends('template')

@section('content')
    @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Pimpinan')
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Laporan Presensi Pegawai</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Laporan Presensi
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <form action="{{ route('laporan') }}" method="GET">
                            <div class="d-flex">
                                <input type="date" name="tanggal_mulai" class="form-control flatpickr-no-config mt-2"
                                    placeholder="Tanggal Mulai" required value="{{ request('tanggal_mulai') }}" />
                                <input type="date" name="tanggal_akhir" class="form-control flatpickr-no-config mt-2"
                                    placeholder="Tanggal Akhir" required value="{{ request('tanggal_akhir') }}" />
                                <input type="text" name="nama_pegawai" class="form-control mt-2"
                                    placeholder="Nama Pegawai" value="{{ request('nama_pegawai') }}" />
                                <button type="submit" class="btn btn-primary ml-2 mt-2">Filter</button>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('tampilkan-pdf', ['tanggal_mulai' => request('tanggal_mulai'), 'tanggal_akhir' => request('tanggal_akhir'), 'nama_pegawai' => request('nama_pegawai')]) }}"
                        class="btn btn-primary">
                        Cetak
                    </a>
                </div>
            </div>
        </section>
    @endif

    @if (auth()->user()->role == 'Pegawai')
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Riwayat Presensi Pegawai</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Riwayat Presensi
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Presensi Masuk</th>
                                <th>Presensi Pulang</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($presensis as $presensi)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $presensi->pegawai->nama_pegawai }}</td>
                                    <td>{{ $presensi->presensi_masuk }}</td>
                                    <td>{{ $presensi->presensi_pulang }}</td>
                                    <td>{{ $presensi->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
