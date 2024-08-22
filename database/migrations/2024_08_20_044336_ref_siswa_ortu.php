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
        Schema::create('ref_siswa_ortu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->string('nama_ayah', 100);
            $table->string('pekerjaan_ayah', 50);
            $table->string('nama_ibu', 100);
            $table->string('pekerjaan_ibu', 50);
            $table->string('telp_ortu', 20);
            $table->string('alamat_ortu', 100);
            $table->string('nama_wali', 100);
            $table->string('pekerjaan_wali', 50);
            $table->string('telp_wali', 20);
            $table->string('alamat_wali', 100);

            $table->foreign('id_siswa')->references('id')->on('ref_siswa')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
