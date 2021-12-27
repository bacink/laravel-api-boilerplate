<?php

use App\Models\Pengajuan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table((new Pengajuan())->getTable(), function (Blueprint $table) {
            $table->json('lama_pendidikan')->nullable()->after('pendidikan_jurusan');
            $table->decimal('ipk', 10, 3)->nullable()->after('pendidikan_jurusan');
            $table->string('ijazah_tanggal')->nullable()->after('pendidikan_jurusan');
            $table->string('ijazah_nomor')->nullable()->after('pendidikan_jurusan');
            $table->string('nim')->nullable()->after('pendidikan_jurusan');
            $table->string('gelar_belakang')->nullable()->after('pendidikan_jurusan');
            $table->string('gelar_depan')->nullable()->after('pendidikan_jurusan');
            $table->enum('prodi_akreditasi', ['a', 'b', 'c'])->nullable()->after('pendidikan_jurusan');
            $table->enum('prodi_status', ['active', 'noactive'])->nullable()->after('pendidikan_jurusan');
            $table->enum('prodi', ['baru', 'konversi/lanjutan', 'program khusus'])->nullable()->after('pendidikan_jurusan');
        });
    }
}
