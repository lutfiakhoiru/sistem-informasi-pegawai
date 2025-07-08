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
        Schema::create('pengalaman_luar_negeri', function (Blueprint $table) {
            $table->increments('id_pengalaman');
            $table->string('NIP');
            $table->string('negara');
            $table->string('tujuan')->nullable();
            $table->string('lama')->nullable();
            $table->string('biaya')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman_luar_negeri');
    }
};
