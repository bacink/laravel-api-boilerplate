<?php

namespace Database\Seeders;

use App\Models\JenisPengajuan;
use App\Models\SyaratPengajuan;
use Illuminate\Database\Seeder;

class SyaratPengajuansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seleksiPendidikan = JenisPengajuan::whereKode('seleksi')->first();
        $izinBelajar = JenisPengajuan::whereKode('sib')->first();

        if ($seleksiPendidikan) {
            $syarat_seleksi_pendidikan = [
                [
                    'jenis_pengajuan_id' => $seleksiPendidikan->jenis_pengajuan_id,
                    'urutan' => '1',
                    'nama' => 'formulir pengajuan',
                    'simpeg_dokumen' => null,
                    'is_upload' => 'true',
                ], [
                    'jenis_pengajuan_id' => $seleksiPendidikan->jenis_pengajuan_id,
                    'urutan' => '2',
                    'nama' => 'sk pangkat terakhir / SP bagi pelaksana',
                    'simpeg_dokumen' => 'sk_pangkat',
                    'is_upload' => 'false',
                ], [
                    'jenis_pengajuan_id' => $seleksiPendidikan->jenis_pengajuan_id,
                    'urutan' => '3',
                    'nama' => 'sk jabatan terakhir',
                    'simpeg_dokumen' => 'sk_jabatan',
                    'is_upload' => 'false',
                ], [
                    'jenis_pengajuan_id' => $seleksiPendidikan->jenis_pengajuan_id,
                    'urutan' => '4',
                    'nama' => 'sk pembagian tugas mengajar (bagi guru)',
                    'simpeg_dokumen' => null,
                    'is_upload' => 'false',
                ]

            ];
        }
        if ($izinBelajar) {


            $syarat_izin_belajar = [
                [
                    'jenis_pengajuan_id' => $izinBelajar->jenis_pengajuan_id,
                    'urutan' => '1',
                    'nama' => 'surat keterangan lulus seleksi pendidikan (dari perguruan tinggi)',
                    'simpeg_dokumen' => null,
                    'is_upload' => 'false',
                ],
                [
                    'jenis_pengajuan_id' => $izinBelajar->jenis_pengajuan_id,
                    'urutan' => '2',
                    'nama' => 'surat keterangan dari sekolah / peruguran tinggi bahwa pendidikan yang ditempuh bukan kelas jauh dan atau kelas sabtu minggu',
                    'simpeg_dokumen' => null,
                    'is_upload' => 'false',
                ],
                [
                    'jenis_pengajuan_id' => $izinBelajar->jenis_pengajuan_id,
                    'urutan' => '3',
                    'nama' => 'surat pernyataan tidak akan menuntut penyesuaian ijazah ke dalam pangkat yang lebih tinggi kecuali ada formasi (ttd ybs bermaterai)',
                    'simpeg_dokumen' => null,
                    'is_upload' => 'false',
                ], [
                    'jenis_pengajuan_id' => $izinBelajar->jenis_pengajuan_id,
                    'urutan' => '4',
                    'nama' => 'surat keterangan dari kepala skpd bawha ybs tidak sedang menjalani hukuman disiplin',
                    'simpeg_dokumen' => null,
                    'is_upload' => 'false',
                ], [
                    'jenis_pengajuan_id' => $izinBelajar->jenis_pengajuan_id,
                    'urutan' => '5',
                    'nama' => 'surat keterangan dari kepala skpd bawha kegiatan pendidikan dilakuakn diluar jam kerja',
                    'simpeg_dokumen' => null,
                    'is_upload' => 'false',
                ]

            ];
        }


        foreach ($syarat_seleksi_pendidikan as $key => $value) {
            SyaratPengajuan::firstOrCreate($value);
        }

        foreach ($syarat_izin_belajar as $key => $value) {
            SyaratPengajuan::firstOrCreate($value);
        }
    }
}
