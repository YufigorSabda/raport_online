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
        Schema::create('ref_sekolah_alamat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sekolah');
            $table->string('jalan', 100);
            $table->string('desa', 100);
            $table->string('kecamatan', 100);
            $table->string('kabupaten', 100);
            $table->string('provinsi', 100);
            $table->string('kode_pos', 100);

            $table->foreign('id_sekolah')->references('id')->on('ref_sekolah')->cascadeOnDelete();
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
