<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'tb_presensi'; // Nama tabel di database
    protected $primaryKey = 'id_presensi'; // Primary key tabel
    public $timestamps = false; // Jika tabel tidak menggunakan kolom created_at dan updated_at

    protected $fillable = [
        'id_pegawai',
        'presensi_masuk',
        'presensi_pulang',
        'keterangan'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
