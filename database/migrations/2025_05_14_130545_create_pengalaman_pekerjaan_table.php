<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengalaman_pekerjaan', function (Blueprint $table) {
            $table->increments('id_pekerjaan');
             $table->string('NIP');
            $table->string('jabatan');
            $table->date('terhitung_mulai')->nullable();
            $table->date('selesai')->nullable();
            $table->string('gol_ruang_penggajian')->nullable();
            $table->string('gaji')->nullable();
            $table->string('s_pejabat')->nullable();
            $table->date('s_tanggal')->nullable();
            $table->string('s_nomor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman_pekerjaan');
    }
};
