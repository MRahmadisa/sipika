@extends('template')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Input Data Pegawai</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Input Data Pegawai
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Input Data Pegawai</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="{{ route('storedatapegawai') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="nip_nuptk">NIP/NUPTK</label>
                                                            <input type="hidden" id="id_pegawai" class="form-control"
                                                                name="id_pegawai" />
                                                            <input type="text" id="nip_nuptk" class="form-control"
                                                                name="nip_nuptk" placeholder="Masukkan NIP/NUPTK" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_pegawai">Nama Pegawai</label>
                                                            <input type="text" id="nama_pegawai" class="form-control"
                                                                name="nama_pegawai" placeholder="Masukkan Nama Pegawai" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_jabatan">Nama Jabatan</label>
                                                            <select class="choices form-group" id="id_jabatan"
                                                                name="id_jabatan">
                                                                <option selected disabled>Pilih Jabatan</option>
                                                                @foreach ($jabatans as $jabatan)
                                                                    <option value="{{ $jabatan->id_jabatan }}" data-default>
                                                                        {{ $jabatan->nama_jabatan }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tempat_lahir">Tempat Lahir</label>
                                                            <input type="text" id="tempat_lahir" class="form-control"
                                                                name="tempat_lahir" placeholder="Masukkan Tempat Lahir" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                                            <input type="date" id="tanggal_lahir" class="form-control"
                                                                name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="agama">Agama</label>
                                                            <select class=" choices form-group" id="agama"
                                                                name="agama">
                                                                <option selected disabled>Pilih Agama</option>
                                                                @foreach ($agamas as $agama)
                                                                    <option value="{{ $agama }}" data-default>
                                                                        {{ $agama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                                            <select class="choices form-group" id="jenis_kelamin"
                                                                name="jenis_kelamin">
                                                                <option selected disabled>Pilih Jenis Kelamin</option>
                                                                @foreach ($jenis_kelamins as $jenis_kelamin)
                                                                    <option value="{{ $jenis_kelamin }}" data-default>
                                                                        {{ $jenis_kelamin }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat">Alamat</label>
                                                            <textarea id="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_telp">No Telp</label>
                                                            <input type="number" id="no_telp" class="form-control"
                                                                name="no_telp" placeholder="Masukkan No Telp" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="foto">Foto</label>
                                                            <input type="file" id="foto" class="form-control"
                                                                name="foto" placeholder="Upload Foto" />
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">Simpan</button>
                                                            <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            <a href="{{ route('datapegawai') }}"
                                                                class="btn btn-danger me-1 mb-1">Batal</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
