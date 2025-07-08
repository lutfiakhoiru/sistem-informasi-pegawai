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
        Schema::create('organisasi', function (Blueprint $table) {
            $table->increments('id_organisasi');
            $table->string('NIP');
            $table->string('nama_organisasi');
            $table->string('kedudukan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('tempat')->nullable();
            $table->string('nama_pimpinan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasi');
    }
};
