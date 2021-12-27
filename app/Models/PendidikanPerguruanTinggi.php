<?php

namespace App\Models;

use App\Traits\SearchTrait;

class PendidikanPerguruanTinggi extends Sotk
{
    use SearchTrait;

    protected $table = 'pendidikan_perguruan_tinggi';

    protected $search = ['nama'];
}
