<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JabatanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_pegawai' => $this->id_pegawai,
            'jenis' => $this->jenis,
            'calon' => $this->calon,
            'nama' => $this->nama,
            'is_jabatan_kepala' => $this->is_jabatan_kepala,
            'referensi' => $this->referensi,
            'skpd' => $this->skpd,
            'unit_kerja' => $this->unit_kerja,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'id_golongan' => $this->id_golongan,
            'id_dokumen' => $this->id_dokumen
        ];
    }
}
