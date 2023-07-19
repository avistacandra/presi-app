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
        Schema::create('tb_presensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('tb_siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mapel_id')->constrained('tb_mapel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kelas_id')->constrained('tb_kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('pertemuan_ke',['1','2','3','4','5','6','7','8','9','10','11','12','13','14']);
            $table->foreignId('jadwalbelajar_id')->constrained('tb_jadwalbelajar')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('ket_presensi',['H','I','S','A']);
            $table->date('tgl_absen');
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
        Schema::dropIfExists('tb_presensi');
    }
};