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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->increments('id_pendidikan');
            $table->string('NIP');
            $table->string('jenjang');
            $table->string('nama_pendidikan');
            $table->string('jurusan')->nullable();
            $table->string('sttb')->nullable();
            $table->string('tempat')->nullable();
            $table->string('nama_dekan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};
