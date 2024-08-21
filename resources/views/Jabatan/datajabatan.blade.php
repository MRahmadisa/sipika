@extends('template')
@section('content')

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Data Tabel Jabatan</title>
    </head>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Jabatan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Jabatan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Data Jabatan</span>
                    <a href="{{ route('inputdatajabatan') }}" class="btn btn-primary btn-sm mb-3">
                        <i class="bi bi-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($jabatans as $jabatan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $jabatan->nama_jabatan }}</td>
                                        <td>
                                            <a href="{{ route('editjabatan', $jabatan->id_jabatan) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i> Ubah
                                            </a>
                                            <form action="{{ route('hapusjabatan', $jabatan->id_jabatan) }}" method="POST"
                                                class="d-inline">
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

    {{-- @section('scripts')
        <script>
            // Menghilangkan alert setelah 3 detik
            setTimeout(function() {
                var alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 3000); // Waktu dalam milidetik (3000ms = 3 detik)
        </script>
    @endsection --}}
