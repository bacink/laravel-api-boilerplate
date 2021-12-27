<?php

namespace App\Models;

use App\Traits\SearchTrait;

class PendidikanSekolah extends Sotk
{
    use SearchTrait;

    protected $table = 'pendidikan_sekolah';

    protected $search = ['nama'];

    protected $filter = ['id_tingkat'];

    public function tingkat()
    {
        return $this->belongsTo(PendidikanTingkat::class, 'id_tingkat');
    }
}
