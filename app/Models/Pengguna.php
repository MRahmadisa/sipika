<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_pengguna'; // Nama tabel di database
    protected $primaryKey = 'id_pengguna'; // Primary key tabel
    public $timestamps = false; // Jika tabel tidak menggunakan kolom created_at dan updated_at

    protected $fillable = [
        'username',
        'password',
        'role',
        'id_pegawai'
    ];

    protected $hidden = [
        'password'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}