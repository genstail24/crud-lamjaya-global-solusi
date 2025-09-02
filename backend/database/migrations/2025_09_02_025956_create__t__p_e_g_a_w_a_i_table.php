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
        Schema::create('T_PEGAWAI', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->datetime('tanggal_lahir');
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('agama');
            $table->foreignId('id_t_provinsi')->references('id')->on('T_PROVINSI')->onDelete('cascade');
            $table->foreignId('id_t_kecamatan')->references('id')->on('T_KECAMATAN')->onDelete('cascade');
            $table->foreignId('id_t_kelurahan')->references('id')->on('T_KELURAHAN')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('T_PEGAWAI');
    }
};
