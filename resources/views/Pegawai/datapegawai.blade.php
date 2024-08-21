@extends('template')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3> Data Pegawai</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Pegawai
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Data Pegawai</span>
                    <a href="{{ route('inputdatapegawai') }}" class="btn btn-primary btn-sm mb-3">
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
                                    <th>NIP/NUPTK</th>
                                    <th>Nama Pegawai</th>
                                    <th>Nama Jabatan</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($pegawais as $pegawai)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $pegawai->nip_nuptk }}</td>
                                        <td>{{ $pegawai->nama_pegawai }}</td>
                                        <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                                        <td>{{ $pegawai->tempat_lahir }}</td>
                                        <td>{{ $pegawai->tanggal_lahir }}</td>
                                        <td>{{ $pegawai->agama }}</td>
                                        <td>{{ $pegawai->jenis_kelamin }}</td>
                                        <td>{{ $pegawai->alamat }}</td>
                                        <td>{{ $pegawai->no_telp }}</td>
                                        <td>
                                            @if ($pegawai->foto)
                                                <img src="{{ asset('foto/' . $pegawai->foto) }}"
                                                    alt="Foto {{ $pegawai->nama_pegawai }}" style="max-width: 100px;">
                                            @else
                                                No Photo
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('editpegawai', $pegawai->id_pegawai) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i> Ubah
                                            </a>
                                            <form action="{{ route('hapuspegawai', $pegawai->id_pegawai) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini? Data pengguna terkait akan ikut terhapus!')">
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
