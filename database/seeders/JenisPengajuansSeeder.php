<?php

namespace Database\Seeders;

use App\Models\JenisPengajuan;
use Illuminate\Database\Seeder;

class JenisPengajuansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis_pengajuan = [
            [
                'kode' => 'seleksi',
                'deskripsi' => 'Pengajuan Mengikuti Seleksi Pendidikan',
            ],
            [
                'kode' => 'sib',
                'deskripsi' => 'Pengajuan Izin Belajar',
            ],
            [
                'kode' => 'pg',
                'deskripsi' => 'Pengajuan Pemakaian Gelar',
            ],
            [
                'kode' => 'ktp',
                'deskripsi' => 'Pengajuan Keterangan lulus pendidikan',
            ]
        ];

        foreach ($jenis_pengajuan as $data) {

            JenisPengajuan::firstOrCreate([
                'kode' => $data['kode'],
                'deskripsi' => $data['deskripsi'],
            ]);
        }
    }
}
