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
        Schema::create('tb_siswa', function (Blueprint $table) {
            $table->id();
            $table->char('nis', 4)->unique();
            $table->string('nm_siswa', 50);
            $table->foreignId('kelas_id')->constrained('tb_kelas')->onDelete('cascade')->onUpdate('cascade');
            // $table->bigInteger('kelas_id')->unsigned();
            $table->enum('jns_kelamin', ['P', 'L']);
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
        Schema::dropIfExists('tb_siswa');
    }
};
