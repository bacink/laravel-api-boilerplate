<?php

namespace App\Models;

class Pendidikan extends Simpeg
{
    protected $table = 'pegawai_pendidikan';
    protected $casts = [
        'tahun_masuk' => 'integer',
        'tahun_lulus' => 'integer',
        'tingkat' => 'array',
        'instansi' => 'array',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
