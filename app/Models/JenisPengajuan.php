<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengajuan extends BaseModel
{
    /**
     * @var String Table Name
     */
    protected $table = 'jenis_pengajuan';


    /**
     * @var int Auto increments integer key
     */
    public $primaryKey = 'jenis_pengajuan_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];
}
