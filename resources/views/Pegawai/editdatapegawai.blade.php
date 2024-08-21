@extends('template')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Data Pegawai</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Data Pegawai
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
                            <h4 class="card-title">Form Edit Data Pegawai</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST"
                                    action="{{ route('updatepegawai', $pegawai->id_pegawai) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nuptk_nik">NIP/NUPTK</label>
                                                    <input type="hidden" id="id_pegawai" class="form-control"
                                                        name="id_pegawai" value="{{ $pegawai->id }}" />
                                                    <input type="text" id="nip_nuptk" class="form-control"
                                                        name="nip_nuptk" placeholder="Masukkan NIP/NUPTK"
                                                        value="{{ $pegawai->nip_nuptk }}" required />
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="nama_pegawai">Nama Pegawai</label>
                                                        <input type="text" id="nama_pegawai" class="form-control"
                                                            name="nama_pegawai" placeholder="Masukkan Nama Pegawai"
                                                            value="{{ $pegawai->nama_pegawai }}" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_jabatan">Nama Jabatan</label>
                                                        <select class="choices form-group" id="id_jabatan"
                                                            name="id_jabatan">
                                                            <option selected disabled>Pilih Jabatan</option>
                                                            @foreach ($jabatans as $jabatan)
                                                                <option value="{{ $jabatan->id_jabatan }}"
                                                                    {{ $pegawai->id_jabatan == $jabatan->id_jabatan ? 'selected' : '' }}>
                                                                    {{ $jabatan->nama_jabatan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tempat_lahir">Tempat Lahir</label>
                                                            <input type="text" id="tempat_lahir" class="form-control"
                                                                name="tempat_lahir" placeholder="Masukkan Tempat Lahir"
                                                                value="{{ $pegawai->tempat_lahir }}" required />
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                                <input type="date" id="tanggal_lahir"
                                                                    class="form-control" name="tanggal_lahir"
                                                                    placeholder="Masukkan Tanggal Lahir"
                                                                    value="{{ $pegawai->tanggal_lahir }}" required />
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="choices form-group">
                                                                    <label for="agama">Agama</label>
                                                                    <select class="choices form-select" id="agama"
                                                                        name="agama" placeholder="Masukkan Agama"
                                                                        required>
                                                                        <option selected="selected">Pilih </option>
                                                                        @foreach ($agamas as $agama)
                                                                            <option value="{{ $agama }}"
                                                                                {{ $pegawai->agama == $agama ? 'selected' : '' }}>
                                                                                {{ $agama }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class=" choices form-group">
                                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                                    <select class="choices form-select" id="jenis_kelamin"
                                                                        name="jenis_kelamin"
                                                                        placeholder="Masukkan Jenis Kelamin" required>
                                                                        <option selected="selected">Pilih </option>
                                                                        @foreach ($jenis_kelamins as $jenis_kelamin)
                                                                            <option value="{{ $jenis_kelamin }}"
                                                                                {{ $pegawai->jenis_kelamin == $jenis_kelamin ? 'selected' : '' }}>
                                                                                {{ $jenis_kelamin }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <textarea id="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat" required>{{ $pegawai->alamat }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="no_telp">No Telp</label>
                                                                    <input type="number" id="no_telp"
                                                                        class="form-control" name="no_telp"
                                                                        placeholder="Masukkan No Telp"
                                                                        value="{{ $pegawai->no_telp }}" required />
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="foto">Foto</label>
                                                                        <input type="file" id="foto"
                                                                            class="form-control" name="foto"
                                                                            placeholder="Upload Foto" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1 mb-1">Simpan
                                                                        Perubahan</button>
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
        </section>
    @endsection
