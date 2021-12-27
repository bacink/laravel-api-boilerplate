<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PendidikanTingkatResource extends JsonResource
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
            'urutan' => $this->urutan,
            'nama' => $this->nama,
            'singkatan' => $this->singkatan,
            'jenjang' => $this->jenjang,
            'jurusan' => $this->pendidikanJurusan,
        ];
    }
}
