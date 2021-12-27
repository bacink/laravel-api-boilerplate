<?php

use App\Models\JenisPengajuan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new JenisPengajuan())->getTable(), function (Blueprint $table) {
            $table->uuid('jenis_pengajuan_id');
            $table->string('kode');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->primary('jenis_pengajuan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new JenisPengajuan())->getTable());
    }
}
