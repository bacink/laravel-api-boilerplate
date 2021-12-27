<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PegawaiResource extends JsonResource
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
            'jenis' => $this->jenis,
            'pns_id' => $this->pns_id,
            'nip_lama' => $this->nip_lama,
            'nip' => $this->nip,
            'nama' => $this->nama,
            'nama_lengkap' => $this->nama_lengkap,
            'panggilan' => $this->panggilan,
            'gelar_depan' => $this->gelar_depan,
            'gelar_belakang' => $this->gelar_belakang,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'agama' => $this->agama,
            'status_pernikahan' => $this->status_pernikahan,
            'tanggal_mulai_bekerja' => $this->tanggal_mulai_bekerja,
            'tanggal_selesai_bekerja' => $this->tanggal_selesai_bekerja,
            'id_dokumen_masuk' => $this->id_dokumen_masuk,
            'id_dokumen_berhenti' => $this->id_dokumen_berhenti,
            'skpd' => $this->skpd,
            'unit_kerja' => $this->unit_kerja,
            'id_atasan' => $this->id_atasan,
            'id_golongan' => $this->id_golongan,
            'status' => $this->status,
            'atasan_langsung' => ($this->atasan) ? new PegawaiResource($this->atasan) : null,
            'bawahan' => (count($this->bawahan) > 0) ? $this->bawahan : null,
            'kontak' => (count($this->kontak)) ? $this->kontak : null,
            'jabatan_aktif' => (count($this->jabatanAktif) > 0) ? JabatanAktifResource::collection($this->jabatanAktif) : null,
            'golongan' => $this->golongan->whereNull('tanggal_selesai')->first(),
            'pendidikan' => ($this->pendidikan) ? new PendidikanResource($this->pendidikan->where('tahun_lulus', $this->pendidikan->max('tahun_lulus'))->first()) : null,
        ];
    }
}
