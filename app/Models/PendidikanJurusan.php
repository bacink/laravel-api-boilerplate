<?php

namespace App\Models;


class PendidikanJurusan extends Sotk
{
    protected $table = 'pendidikan_jurusan';

    public function pendidikanTingkat()
    {
        return $this->belongsToMany(PendidikanTingkat::class, 'pendidikan_jurusan_tingkat', 'id_tingkat', 'id_jurusan');
    }
}
