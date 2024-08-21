@extends('template')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Input Data Jabatan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Input Data Jabatan
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
                                <h4 class="card-title">Form Input Data Jabatan</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical" action="{{ route('storedatajabatan') }}"
                                        method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="nama_jabatan">Nama Jabatan</label>
                                                        <input type="hidden" id="id_jabatan" class="form-control"
                                                            name="id_jabatan" />
                                                        <input type="text" id="nama_jabatan" class="form-control"
                                                            name="nama_jabatan" placeholder="Masukkan Nama Jabatan"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    <a href="{{ route('datajabatan') }}"
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
