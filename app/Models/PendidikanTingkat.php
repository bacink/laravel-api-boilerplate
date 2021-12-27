<?php

namespace App\Models;

class PendidikanTingkat extends Sotk
{
    protected $table = 'pendidikan_tingkat';

    public function pendidikanJurusan()
    {
        return $this->belongsToMany(PendidikanJurusan::class, 'pendidikan_jurusan_tingkat', 'id_tingkat', 'id_jurusan');
    }

    public function pendidikanSekolah()
    {
        return $this->hasMany(pendidikanSekolah::class, 'id_tingkat');
    }
}
