<?php

namespace App\Http\Controllers;

use App\Http\Resources\PengajuanResource;
use App\Models\Pengajuan;
use File;
use Illuminate\Routing\Controller as DefaultController;
use Novay\WordTemplate\WordTemplate;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExportToOfficeController extends DefaultController
{
    public function seleksiPendidikan($PengajuanId)
    {

        $word = new WordTemplate;
        $file = public_path('templates/form_seleksi_pendidikan.rtf');

        $data =  Pengajuan::findOrFail($PengajuanId);

        $data =  $data->with('pendidikanTingkat')->first();

        $isExists = File::exists($file);

        if (!$isExists) {
            throw new NotFoundHttpException('Resource Document'  . '\' with given ID ' . $PengajuanId . ' not found');
        }
        $pangkat =  $data->kepala_unit_kerja['golongan']['referensi']['pangkat'] . ', ' . $data->kepala_unit_kerja['golongan']['referensi']['golongan'];
        $jenjang_pendidikan = $data->pendidikanTingkat->nama . ' (' . $data->pendidikanTingkat->singkatan . ')';
        $perguruan_tinggi =  $data['pendidikan_institusi']['nama'];
        $jurusan =  $data['jurusan']['nama'];
        $array = array(
            '[nama]' => $data->pegawai['nama_lengkap'],
            '[nip]' => $data->pegawai['nip'],
            '[pangkat]' => $data->pegawai['pangkat'],
            '[jabatan]' => $data->pegawai['jabatan'],
            '[unit_kerja]' => $data->pegawai['unit_kerja'],
            '[kepala_skpd_jabatan]' => $data->kepala_unit_kerja['jabatan_aktif'][0]['jabatan']['nama'],
            '[kepala_skpd_nama]' => $data->kepala_unit_kerja['nama_lengkap'],
            '[kepala_skpd_pangkat]' => $pangkat,
            '[kepala_skpd_nip]' => $data->kepala_unit_kerja['nip'],
            '[jenjang_pendidikan]' => $jenjang_pendidikan,
            '[pt]' => $perguruan_tinggi,
            '[jurusan]' => $jurusan,
        );
        // return $array;
        $nama_file = 'formulir_seleksi_pendidikan.doc';

        return $word->export($file, $array, $nama_file);
    }
}
