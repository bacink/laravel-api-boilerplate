<?php

namespace App\Models;


class SyaratPengajuan extends BaseModel
{
    protected $table = 'syarat_pengajuan';

    /**
     * @var int Auto increments integer key
     */
    public $primaryKey = 'syarat_pengajuan_id';

    const SIMPEG_DOKUMEN =  [
        'sk_pns', 'sk_pangkat', 'sk_jabatan', 'sk_diklat', 'ijazah'
    ];

    const IS_UPLOAD =  [
        'true', 'false'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'syarat_pengajuan_id'
    ];
}
