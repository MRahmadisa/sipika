<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai'; // Nama tabel di database
    protected $primaryKey = 'id_pegawai'; // Primary key tabel
    public $timestamps = false; // Jika tabel tidak menggunakan kolom created_at dan updated_at

    protected $fillable = [
        'nip_nuptk',
        'nama_pegawai',
        'id_jabatan',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'alamat',
        'no_telp',
        'foto'

    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'id_pegawai', 'id_pegawai');
    }
}
