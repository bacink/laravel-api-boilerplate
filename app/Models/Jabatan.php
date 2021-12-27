<?php

namespace App\Models;

class Jabatan extends Simpeg
{
    protected $table = 'pegawai_jabatan';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function jabatanAktif()
    {
        return $this->hasMany(JabatanAktif::class, 'id_jabatan');
    }

    protected $casts = [
        'referensi' => 'array',
        'skpd' => 'array',
        'unit_kerja' => 'array',
    ];
}
