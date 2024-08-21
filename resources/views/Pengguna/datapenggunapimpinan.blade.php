@extends('template')
@section('content')

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Data Tabel Pengguna Pimpinan</title>
    </head>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Pengguna Pimpinan</h3>
                </div>

                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Pengguna Pimpinan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Data Pengguna Pimpinan</span>
                    <a href="{{ route('inputdatapenggunapimpinan') }}" class="btn btn-primary btn-sm mb-3">
                        <i class="bi bi-plus"></i> Tambah Data
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Nama Pegawai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($penggunas as $pengguna)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $pengguna->username }}</td>
                                        <td>{{ str_repeat('*', 10) }}</td> <!-- Ubah password jadi bintang -->
                                        <td>{{ $pengguna->role }}</td>
                                        <td>{{ $pengguna->pegawai->nama_pegawai ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('editpenggunapimpinan', $pengguna->id_pengguna) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i> Ubah
                                            </a>
                                            <form action="{{ route('hapuspenggunapimpinan', $pengguna->id_pengguna) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endsection
