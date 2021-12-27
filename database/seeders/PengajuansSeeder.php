<?php

namespace Database\Seeders;

use App\Models\Pengajuan;
use Illuminate\Database\Seeder;

class PengajuansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengajuan::firstOrCreate([
            'name' => 'izin belajar',
            'description' => 'Administrator Users',
        ]);

        Pengajuan::firstOrCreate([
            'name' => 'pemakaian gelar',
            'description' => 'Administrator Users',
        ]);
    }
}
