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
        Schema::create('riwayat_kepangkatan', function (Blueprint $table) {
            $table->increments('id_kepangkatan');
            $table->string('NIP');
            $table->string('pangkat');
            $table->string('gol_ruang_penggajian')->nullable();
            $table->date('terhitung_mulai')->nullable();
            $table->string('gaji')->nullable();
            $table->string('s_pejabat')->nullable();
            $table->date('s_tanggal')->nullable();
            $table->string('s_nomor')->nullable();
            $table->string('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_kepangkatan');
    }
};
