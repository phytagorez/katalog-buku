<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_karyawan';

    // fillable => kolom kolom yang boleh diisi
    protected $fillable = [
        'nama',
        'alamat',
    ];
}
