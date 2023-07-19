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
        Schema::create('tb_jadwalbelajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->constrained('tb_guru')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mapel_id')->constrained('tb_mapel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kelas_id')->constrained('tb_kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('hari', 20);
            $table->string('jam_belajar', 20);
            $table->foreignId('semester_id')->constrained('tb_semester')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tahunajaran_id')->constrained('tb_thn_ajaran')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tb_jadwalbelajar');
    }
};
