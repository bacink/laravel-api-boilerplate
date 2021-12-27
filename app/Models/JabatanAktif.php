<?php

namespace App\Models;

class JabatanAktif extends Simpeg
{
    protected $table = 'pegawai_jabatan_aktif';

    public function pegawai()
    {
        return  $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function jabatan()
    {
        return  $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}
