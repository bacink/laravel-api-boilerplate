<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JabatanAktifResource extends JsonResource
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
            'id_jabatan' => $this->id_jabatan,
            'sotk_id_jabatan' => $this->sotk_id_jabatan,
            'jabatan' => ($this->jabatan) ? $this->jabatan : null,
            'pegawai' => ($this->pegawai) ? $this->pegawai : null,
        ];
    }
}
