<?php

namespace App\Models;

class Golongan extends Simpeg
{
    protected $table = 'pegawai_golongan';
    protected $casts = [
        'referensi' => 'array',
        'masa_kerja' => 'array'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
