<?php

use App\Models\JenisPengajuan;
use App\Models\Pengajuan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Pengajuan())->getTable(), function (Blueprint $table) {
            $table->uuid('pengajuan_id');
            $table->uuid('jenis_pengajuan_id')->nullable();
            $table->uuid('pegawai_id')->nullable();
            $table->uuid('kepala_unit_kerja_id')->nullable();
            $table->unsignedInteger('skpd_id')->nullable();
            $table->json('pendidikan_tingkat')->nullable();
            $table->json('pendidikan_institusi')->nullable();
            $table->string('pendidikan_jurusan')->nullable();
            $table->decimal('skp', 10, 3)->nullable();
            $table->string('kelas')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->primary('pengajuan_id');
            $table->foreign('jenis_pengajuan_id')->references('jenis_pengajuan_id')->on((new JenisPengajuan())->getTable())->onDelete('set null');
            $table->foreign('pegawai_id')->references('id')->on('simpeg_new.pegawai')->onDelete('set null');
            $table->foreign('kepala_unit_kerja_id')->references('id')->on('simpeg_new.pegawai')->onDelete('set null');
            $table->foreign('skpd_id')->references('id')->on('simpeg_sotk.skpd')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new Pengajuan())->getTable());
    }
}
