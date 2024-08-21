@extends('template')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Data Pengguna Pimpinan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Data Pengguna Pimpinan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pengguna Pimpinan</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-3">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="form form-vertical" method="post"
                                    action="{{ route('updatepenggunapimpinan', $pengguna->id_pengguna) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="{{ $pengguna->username }}" required>

                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" id="password" name="password"
                                                value="{{ $pengguna->password }}" required>

                                            <label for="role">Role</label>
                                            <input type="text" class="form-control" id="role" name="role"
                                                value="{{ $pengguna->role }}" required>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    var roleInput = document.getElementById('role');
                                                    if (roleInput.value === 'Pimpinan') {
                                                        roleInput.setAttribute('readonly', 'readonly');
                                                    }
                                                });
                                            </script>
                                            <div class="form-group">
                                                <label for="id_pegawai">Nama Pegawai</label>
                                                <select class="form-select" id="id_pegawai" name="id_pegawai">
                                                    <option selected disabled>Pilih Pegawai</option>
                                                    @foreach ($pegawais as $pegawai)
                                                        <option value="{{ $pegawai->id_pegawai }}"
                                                            {{ $pengguna->id_pegawai == $pegawai->id_pegawai ? 'selected' : '' }}>
                                                            {{ $pegawai->nama_pegawai }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan
                                                Perubahan</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            <a href="{{ route('datapenggunapimpinan') }}"
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
