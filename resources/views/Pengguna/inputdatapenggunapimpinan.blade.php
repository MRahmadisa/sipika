@extends('template')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Input Data Pengguna Pimpinan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Input Data Pengguna Pimpinan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Input Data Pengguna Pimpinan</h4>
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
                                            <form class="form form-vertical"
                                                action="{{ route('storedatapenggunapimpinan') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <input type="hidden" id="id_pengguna" class="form-control"
                                                            name="id_pengguna" />
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="username">Username</label>
                                                                <input type="text" id="username" class="form-control"
                                                                    name="username" placeholder="Masukkan Username" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input type="text" id="password" class="form-control"
                                                                    name="password" placeholder="Masukkan Password" />
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="role">Role</label>
                                                                <input type="text" class="form-control" id="role"
                                                                    name="role" readonly value="Pimpinan" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="id_pegawai">Nama Pegawai</label>
                                                            <select class="form-select" id="id_pegawai" name="id_pegawai">
                                                                <option selected disabled>Pilih Nama Pegawai</option>
                                                                @foreach ($pegawais as $pegawai)
                                                                    <option value="{{ $pegawai->id_pegawai }}" data-default>
                                                                        {{ $pegawai->nama_pegawai }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                                        Simpan
                                                    </button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                        Reset
                                                    </button>
                                                    <a href="{{ route('datapenggunapimpinan') }}"
                                                        class="btn btn-danger me-1 mb-1">Batal</a>
                                                </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
