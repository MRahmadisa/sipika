<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Presensi;
use App\Models\Pegawai;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d'); // Ambil tanggal hari ini

        // Jumlah kehadiran hari ini
        $jumlahKehadiranHariIni = Presensi::whereDate('presensi_masuk', $today)->count();

        // Jumlah kehadiran tepat waktu 
        $jumlahKehadiranTepatWaktu = Presensi::whereDate('presensi_masuk', $today)
            ->whereRaw('TIME(presensi_masuk) <= "07:00:00"') // Filter presensi_masuk sebelum atau jam 07:00
            ->count();

        // Jumlah pegawai
        $jumlahPegawai = Pegawai::count();

        return view('dashboard', compact('jumlahKehadiranHariIni', 'jumlahKehadiranTepatWaktu', 'jumlahPegawai'));
    }


    public function getKehadiranPerBulan()
    {
        // Jumlah kehadiran per bulan
        $kehadiranPerBulan = Presensi::selectRaw('MONTH(presensi_masuk) as bulan, COUNT(*) as jumlah')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get()
            ->pluck('jumlah', 'bulan')
            ->toArray();

        // Isi bulan yang tidak ada dengan 0
        $kehadiranPerBulan = array_replace(array_fill(1, 12, 0), $kehadiranPerBulan);

        return response()->json($kehadiranPerBulan);
    }
}
