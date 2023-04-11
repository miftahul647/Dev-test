<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'umur',
        'alamat',
        'agama',
        'jenis_kelamin',
        'nomor_handphone',
        'email'
    ];
}
