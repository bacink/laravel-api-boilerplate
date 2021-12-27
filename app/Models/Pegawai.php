<?php

namespace App\Models;

use App\Traits\SearchTrait;

class Pegawai extends Simpeg
{
    use SearchTrait;

    protected $table = 'pegawai';

    protected $keyType = 'string';

    protected $search = ['nip', 'nama'];

    protected $casts = [
        'skpd' => 'array',
        'unit_kerja' => 'array',
    ];

    public function getNamaLengkapAttribute()
    {
        ($this->gelar_depan) ? $gelarDepan = $this->gelar_depan . '.' : $gelarDepan = '';
        ($this->gelar_belakang) ? $gelarBelakang = ', ' . $this->gelar_belakang : $gelarBelakang = '';
        return $gelarDepan . $this->nama . $gelarBelakang;
    }

    public function atasan()
    {
        return $this->belongsTo(self::class, 'id_atasan');
    }

    public function bawahan()
    {
        return $this->hasMany(self::class, 'id_atasan');
    }

    public function jabatanAktif()
    {
        return $this->hasMany(JabatanAktif::class, 'id_pegawai');
    }

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class, 'id_pegawai');
    }

    public function golongan()
    {
        return $this->hasMany(Golongan::class, 'id_pegawai');
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'id_pegawai');
    }

    public function kontak()
    {
        return $this->hasMany(PegawaiKontak::class, 'id_pegawai');
    }
}
