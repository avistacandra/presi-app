<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ijinkeluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gurupiket_id')->constrained('tb_guru_piket')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('mapel_id')->constrained('tb_siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('siswa_id')->constrained('tb_siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kelas_id')->constrained('tb_kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ijin_jam', 11);
            $table->string('ket');
            $table->string('alasan');
            $table->date('tgl_ijinkeluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ijinkeluar');
    }
};
