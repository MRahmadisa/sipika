<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::with('jabatan')->get();
        return view('Pegawai.datapegawai', compact('pegawais'));
    }

    public function inputdatapegawai()
    {
        $jenis_kelamins = ['Laki-Laki', 'Perempuan'];
        $agamas = ['Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghuchu'];
        $jabatans = Jabatan::all(); 
        
        return view('Pegawai.inputdatapegawai', compact('jenis_kelamins', 'agamas', 'jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip_nuptk',
            'nama_pegawai' => 'required',
            'id_jabatan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'foto'
        ]);
    
        \Log::info('Request Data:', $request->all());
    
        $filename = 'default.jpg'; // default photo
    
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto'), $filename);
        }
    
        Pegawai::create([
            'nip_nuptk' => $request->nip_nuptk,
            'nama_pegawai' => $request->nama_pegawai,
            'id_jabatan' => $request->id_jabatan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'foto' => $filename
        ]);
    
        return redirect()->route('datapegawai')->with('success', 'Data pegawai berhasil ditambahkan.');
    }
    
    
    public function editpegawai($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $jenis_kelamins = ['Laki-Laki', 'Perempuan'];
        $agamas = ['Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghuchu'];
        $jabatans = Jabatan::all();

        return view('Pegawai.editdatapegawai', compact('pegawai', 'jenis_kelamins', 'agamas', 'jabatans'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nip_nuptk',
        'nama_pegawai' => 'required',
        'id_jabatan' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'agama' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required',
        'foto'
    ]);

    $pegawai = Pegawai::findOrFail($id);

    $data = [
        'nip_nuptk' => $request->nip_nuptk,
        'nama_pegawai' => $request->nama_pegawai,
        'id_jabatan' => $request->id_jabatan,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'agama' => $request->agama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'no_telp' => $request->no_telp
    ];

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('foto'), $filename); // Pindahkan file ke public/foto
        
        // Simpan $filename ke dalam atribut 'foto' pada model pegawai
        $data['foto'] = $filename;
        
        // Hapus foto lama jika ada
        if ($pegawai->foto && file_exists(public_path('foto/' . $pegawai->foto))) {
            unlink(public_path('foto/' . $pegawai->foto));
        }
    }

    $pegawai->update($data);

    return redirect()->route('datapegawai')->with('success', 'Data pegawai berhasil diperbarui.');
}

public function destroy($id)
{
    $pegawai = Pegawai::findOrFail($id);

    // Hapus foto jika ada dan bukan foto default
    if ($pegawai->foto && file_exists(public_path('foto/' . $pegawai->foto)) && $pegawai->foto !== 'default.jpg') {
        unlink(public_path('foto/' . $pegawai->foto));
    }

    // Hapus data terkait di tabel tb_pengguna
    $pegawai->pengguna()->delete();

    // Hapus data pegawai
    $pegawai->delete();

    return redirect()->route('datapegawai')->with('success', 'Data pegawai berhasil dihapus.');
}


    
}
