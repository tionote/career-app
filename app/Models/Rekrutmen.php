<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekrutmen extends Model
{
    use HasFactory;

    protected $table = 'rekrutmen';

    protected $fillable = [
        'no_ktp',
        'nama',
        'email',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jurusan',
        'asal_sekolah',
        'pendidikan',
        'sumber_info',
        'bagian',
        'gaji_diinginkan',
        'jenis_kelamin',
        'pas_photo',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'alamat_lengkap',
        'pengalaman_kerja',
    ];

    protected $casts = [
        'pengalaman_kerja' => 'array', // Memastikan data pengalaman kerja disimpan sebagai array
    ];
}
