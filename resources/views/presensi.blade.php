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

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Presensi Hari Ini</h5>

                @if (isset($presensiHariIni))
                    <p>Anda sudah melakukan presensi masuk pada: {{ $presensiHariIni->presen_masuk }}</p>

                    @if (is_null($presensiHariIni->presensi_pulang))
                        <form action="{{ route('presensi.pulang') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Presensi Pulang</button>
                        </form>
                    @else
                        <p>Anda sudah melakukan presensi pulang pada: {{ $presensiHariIni->presensi_pulang }}</p>
                    @endif
                @else
                    <form action="{{ route('presensi.masuk') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Presensi Masuk</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
