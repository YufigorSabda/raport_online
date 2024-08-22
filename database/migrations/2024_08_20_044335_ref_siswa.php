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
        Schema::create('ref_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa', 50);
            $table->string('nis', 30);
            $table->string('nisn', 30);
            $table->string('nik', 30);
            $table->string('telp_rumah', 20)->nullable();
            $table->string('telp_seluler', 20);
            $table->string('alamat', 100);
            $table->string('tempat_lahir', 30);
            $table->date('tgl_lahir');
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->unsignedBigInteger('id_gender');
            $table->unsignedBigInteger('id_agama');
            $table->unsignedBigInteger('id_status_dk');
            $table->integer('anak_ke');
            $table->string('sekolah_asal', 50);
            $table->date('tgl_masuk');
            $table->unsignedBigInteger('id_tingkat');
            $table->integer('is_active')->default(1);

            $table->foreign('id_gender')->references('id')->on('ref_gender')->cascadeOnDelete();
            $table->foreign('id_agama')->references('id')->on('ref_agama')->cascadeOnDelete();
            $table->foreign('id_status_dk')->references('id')->on('ref_status_dk')->cascadeOnDelete();
            $table->foreign('id_tingkat')->references('id')->on('ref_tingkat')->cascadeOnDelete();
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
