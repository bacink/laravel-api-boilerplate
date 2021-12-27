<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PendidikanResource extends JsonResource
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
            'jenjang' => $this->jenjang,
            'tingkat' => $this->tingkat,
            'jurusan' => (is_object(json_decode($this->jurusan))) ? json_decode($this->jurusan) : trim($this->jurusan, '"'),
            'instansi' => $this->instansi,
            'tahun_masuk' => $this->tahun_masuk,
            'tahun_lulus' => $this->tahun_lulus,
            'id_dokumen' => $this->id_dokumen,

        ];
    }
}
