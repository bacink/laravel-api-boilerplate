<?php

use App\Models\JenisPengajuan;
use App\Models\SyaratPengajuan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyaratPengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new SyaratPengajuan())->getTable(), function (Blueprint $table) {
            $table->uuid('syarat_pengajuan_id');
            $table->uuid('jenis_pengajuan_id')->nullable();
            $table->integer('urutan');
            $table->string('nama');
            $table->enum('simpeg_dokumen', SyaratPengajuan::SIMPEG_DOKUMEN)->nullable()->default(null);
            $table->enum('is_upload', SyaratPengajuan::IS_UPLOAD)->default('true');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('syarat_pengajuan_id');
            $table->foreign('jenis_pengajuan_id')->references('jenis_pengajuan_id')->on((new JenisPengajuan())->getTable())->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syarat_pengajuans');
    }
}
