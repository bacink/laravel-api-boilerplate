<?php

namespace App\Models;

class PegawaiKontak extends Simpeg
{
    protected $table = 'pegawai_kontak';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
