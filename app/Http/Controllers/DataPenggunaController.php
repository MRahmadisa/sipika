<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Pegawai;

class DataPenggunaController extends Controller
{
    // Untuk Pengguna Admin
    public function indexadmin()
    {
        $penggunas = Pengguna::with('pegawai')->where('role', 'admin')->get();
        return view('Pengguna.datapenggunaadmin', compact('penggunas'));
    }
    

    public function inputdatapenggunaadmin()
    {
        $pegawais = Pegawai::select('id_pegawai', 'nama_pegawai')->get();
        return view('Pengguna.inputdatapenggunaadmin', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'id_pegawai' => 'required'
        ]);

        Pengguna::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Encrypt the password
            'role' => $request->role,
            'id_pegawai' => $request->id_pegawai
        ]);

        return redirect()->route('datapenggunaadmin')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function editpenggunaadmin($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pegawais = Pegawai::select('id_pegawai', 'nama_pegawai')->get();

        return view('Pengguna.editdatapenggunaadmin', compact('pengguna','pegawais'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'id_pegawai' => 'required'
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Encrypt the password
            'role' => $request->role,
            'id_pegawai' => $request->id_pegawai
        ]);

        return redirect()->route('datapenggunaadmin')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('datapenggunaadmin')->with('success', 'Data pengguna berhasil dihapus.');
    }
    
// Untuk Pengguna Pegawai
    public function indexpegawai()
    {
        $penggunas = Pengguna::with('pegawai')->where('role', 'pegawai')->get();
        return view('Pengguna.datapenggunapegawai', compact('penggunas'));
    }

    public function inputdatapenggunapegawai()
    {
        $pegawais = Pegawai::select('id_pegawai', 'nama_pegawai')->get();

        return view('Pengguna.inputdatapenggunapegawai', compact('pegawais'));
    }

    public function storepgw(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'id_pegawai' => 'required'
        ]);

        Pengguna::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Encrypt the password
            'role' => $request->role,
            'id_pegawai' => $request->id_pegawai
        ]);

        return redirect()->route('datapenggunapegawai')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function editpenggunapegawai($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pegawais = Pegawai::select('id_pegawai', 'nama_pegawai')->get();

        return view('Pengguna.editdatapenggunapegawai', compact('pengguna','pegawais'));
    }

    public function updatepgw(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'id_pegawai' => 'required'
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Encrypt the password
            'role' => $request->role,
            'id_pegawai' => $request->id_pegawai
        ]);

        return redirect()->route('datapenggunapegawai')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroypgw($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('datapenggunapegawai')->with('success', 'Data pengguna berhasil dihapus.');
    }

// Untuk Pengguna Pimpinan
public function indexpimpinan()
    {
        $penggunas = Pengguna::with('pegawai')->where('role', 'pimpinan')->get();
        return view('Pengguna.datapenggunapimpinan', compact('penggunas'));
    }

    public function inputdatapenggunapimpinan()
    {
        $pegawais = Pegawai::select('id_pegawai', 'nama_pegawai')->get();

        return view('Pengguna.inputdatapenggunapimpinan', compact('pegawais'));
    }

    public function storeppm(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'id_pegawai' => 'required'
        ]);

        Pengguna::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Encrypt the password
            'role' => $request->role,
            'id_pegawai' => $request->id_pegawai
        ]);

        return redirect()->route('datapenggunapimpinan')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function editpenggunapimpinan($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pegawais = Pegawai::select('id_pegawai', 'nama_pegawai')->get();

        return view('Pengguna.editdatapenggunapimpinan', compact('pengguna','pegawais'));
    }

    public function updateppm(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'id_pegawai' => 'required'
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Encrypt the password
            'role' => $request->role,
            'id_pegawai' => $request->id_pegawai
        ]);

        return redirect()->route('datapenggunapimpinan')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroyppm($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('datapenggunapimpinan')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
