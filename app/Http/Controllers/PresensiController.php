<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PresensiController extends Controller
{
    public function presensiMasuk(Request $request)
    {
        $idPegawai = Auth::user()->id_pegawai; // Asumsikan user sudah login
        $currentTime = Carbon::now('Asia/Jakarta'); // Pastikan timezone Jakarta
        $keterangan = $currentTime->hour < 7 ? 'Tepat Waktu' : 'Terlambat';

        // Cek apakah presensi untuk hari ini sudah ada
        $presensiHariIni = Presensi::where('id_pegawai', $idPegawai)
                                    ->whereDate('presensi_masuk', Carbon::today('Asia/Jakarta')) // Pastikan timezone Jakarta
                                    ->first();

        // Jika sudah ada presensi masuk, tidak perlu membuat baru
        if ($presensiHariIni) {
            return redirect()->back()->with('message', 'Anda sudah melakukan presensi masuk hari ini.');
        }

        // Simpan presensi masuk baru
        $presensi = new Presensi();
        $presensi->id_pegawai = $idPegawai;
        $presensi->presensi_masuk = $currentTime;
        $presensi->keterangan = $keterangan;
        $presensi->save();

        return redirect()->back()->with('message', 'Terima kasih sudah melakukan presensi masuk!');
    }

    public function presensiPulang(Request $request)
    {
        $idPegawai = Auth::user()->id_pegawai; // Asumsikan user sudah login
        
        // Ambil presensi hari ini untuk pegawai yang sedang login
        $presensiHariIni = Presensi::where('id_pegawai', $idPegawai)
                                    ->whereDate('presensi_masuk', Carbon::today('Asia/Jakarta')) // Pastikan timezone Jakarta
                                    ->first();

        // Jika belum ada presensi masuk hari ini, kembalikan dengan pesan
        if (!$presensiHariIni) {
            return redirect()->back()->with('message', 'Anda belum melakukan presensi masuk hari ini.');
        }

        // Jika sudah ada presensi masuk, update presensi pulang
        if (is_null($presensiHariIni->presensi_pulang)) {
            $presensiHariIni->presensi_pulang = Carbon::now('Asia/Jakarta'); // Pastikan timezone Jakarta
            $presensiHariIni->save();
        } else {
            return redirect()->back()->with('message', 'Anda sudah melakukan presensi pulang hari ini.');
        }

        return redirect()->back()->with('message', 'Terima kasih sudah melakukan presensi pulang!');
    }
}
