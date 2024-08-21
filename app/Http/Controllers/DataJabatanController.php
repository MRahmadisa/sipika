<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class DataJabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('Jabatan.datajabatan', compact('jabatans'));
    }

    public function inputdatajabatan()
    {
        return view('Jabatan.inputdatajabatan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required'
        ]);

        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan
        ]);

        return redirect()->route('datajabatan')->with('success', 'Data jabatan berhasil ditambahkan.');
    }

    public function editjabatan($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('Jabatan.editdatajabatan', compact('jabatan'));
    }

    public function editjabatans($id)
    {
        $jabatans = Jabatan::findOrFail($id);
        return view('Jabatan.editjabatan.editjabatans', compact('jabatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required'
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update([
            'nama_jabatan' => $request->nama_jabatan
        ]);

        return redirect()->route('datajabatan')->with('success', 'Data jabatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('datajabatan')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
