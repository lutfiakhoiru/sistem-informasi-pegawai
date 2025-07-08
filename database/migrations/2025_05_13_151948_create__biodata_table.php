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
        Schema::create('Biodata', function (Blueprint $table) {
            $table->string('NIP',20)->primary();
            $table->string('NIK',20);
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('status')->nullable();
            $table->string('agama')->nullable();
            $table->string('hobi')->nullable();
            $table->string('jalan')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('status_pegawai')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('masa_kerja')->nullable();
            $table->string('no_karpeg')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('npwp')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('rambut')->nullable();
            $table->string('bentuk_muka')->nullable();
            $table->string('warna_kulit')->nullable();
            $table->string('ciri_khas')->nullable();
            $table->string('cacat')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('foto')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Biodata');
    }
};
