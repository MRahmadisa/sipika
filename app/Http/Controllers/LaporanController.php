<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalAkhir = $request->input('tanggal_akhir');
        $namaPegawai = $request->input('nama_pegawai');

        $query = Presensi::query();

        // Filter berdasarkan pengguna yang login (untuk role pegawai)
        if (auth()->user()->role == 'Pegawai') {
            $query->where('id_pegawai', auth()->user()->id_pegawai);
        }

        if ($tanggalMulai && $tanggalAkhir) {
            $query->whereBetween('presensi_masuk', [$tanggalMulai, $tanggalAkhir]);
        }

        if ($namaPegawai) {
            $query->whereHas('pegawai', function($q) use ($namaPegawai) {
                $q->where('nama_pegawai', 'like', '%' . $namaPegawai . '%');
            });
        }

        $presensis = $query->get();

        return view('Laporan.laporan', compact('presensis', 'tanggalMulai', 'tanggalAkhir', 'namaPegawai'));
    }

    public function generatePdf(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalAkhir = $request->input('tanggal_akhir');
        $namaPegawai = $request->input('nama_pegawai');

        $query = Presensi::query();

        // Filter berdasarkan pengguna yang login (untuk role pegawai)
        if (auth()->user()->role == 'pegawai') {
            $query->where('id_pegawai', auth()->user()->id_pegawai);
        }

        if ($tanggalMulai && $tanggalAkhir) {
            $query->whereBetween('presensi_masuk', [$tanggalMulai, $tanggalAkhir]);
        }

        if ($namaPegawai) {
            $query->whereHas('pegawai', function($q) use ($namaPegawai) {
                $q->where('nama_pegawai', 'like', '%' . $namaPegawai . '%');
            });
        }

        $presensi = $query->get();

        $data = [
            'title' => 'Laporan Presensi Pegawai SMK YPK Purwakarta',
            'date' => date('d/m/y'),
            'presensi' => $presensi
        ];

        $pdf = Pdf::loadView('Laporan.laporanpdf', $data);
        return $pdf->stream('laporan-presensi.pdf');
    }
}
