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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id('id_absen');
            $table->biginteger('id_member');
            $table->date('tangal_absen');
            $table->time('jam_absen')->nullable();
            $table->string('status_absen');
            $table->string('file_absen')->nullable();
            $table->text('laporan_absen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
