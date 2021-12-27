<?php

namespace App\Models;

class Pengajuan extends BaseModel
{

    /**
     * @var String Table Name
     */
    protected $table = 'pengajuan';

    /**
     * @var array Relations to load implicitly by Restful controllers
     */
    public static $localWith = ['pendidikanTingkat', 'jenisPengajuan'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'pendidikan_institusi' => 'array',
        'pendidikan_tingkat' => 'array',
        'kelas' => 'array',
    ];


    /**
     * @var int Auto increments integer key
     */
    public $primaryKey = 'pengajuan_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'pengajuan_id', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Return the validation rules for this model
     *
     * @return array Rules
     */
    public function getValidationRules()
    {
        return [
            'jenis_pengajuan_id' => 'required|exists:' . (new JenisPengajuan())->getTable(),
            'pegawai_id' => 'required|exists:App\Models\Pegawai,id',
            'skpd_id' => 'required',
            'kepala_unit_kerja_id' => 'required',
            'pendidikan_tingkat' => 'required',
            'pendidikan_jurusan' => 'required',
            'pendidikan_institusi' => 'required',
            'skp' => 'required',
            'pendidikan_jurusan' => 'required_if:jenis_pengajuan.kode,sib',
            'prodi' => 'required',
            'prodi_status' => 'required',
            'prodi_akreditasi' => 'required',
            'kelas' => 'required|array',
        ];
    }

    public function pendidikanTingkat()
    {
        return $this->belongsTo(PendidikanTingkat::class, 'pendidikan_tingkat_id');
    }

    public function jenisPengajuan()
    {
        return $this->belongsTo(JenisPengajuan::class, 'jenis_pengajuan_id');
    }
}
