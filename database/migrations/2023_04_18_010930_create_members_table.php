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
        Schema::create('members', function (Blueprint $table) {
            $table->id('id_member');
            $table->string('nama');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('foto_profil')->nullable();
            $table->string('no_identitas')->unique()->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('keahlian')->nullable();
            $table->string('status_akun');
            $table->string('status_pkl');
            $table->string('role');
            $table->string('nama_orangtua')->nullable();
            $table->string('no_telepon_orangtua')->nullable();
            $table->string('alamat_orangtua')->nullable();
            $table->date('mulai_pkl')->nullable();
            $table->date('selesai_pkl')->nullable();
            $table->string('pembimbing_sekolah')->nullable();
            $table->string('pembimbing_industri')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
