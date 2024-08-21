<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'tb_jabatan'; // Nama tabel di database
    protected $primaryKey = 'id_jabatan'; // Primary key tabel
    public $timestamps = false; // Jika tabel tidak menggunakan kolom created_at dan updated_at

    protected $fillable = [
        'nama_jabatan'
    ];
}
