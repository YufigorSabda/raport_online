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
        Schema::create('ref_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas', 100);
            $table->unsignedBigInteger('id_tingkat');
            $table->unsignedBigInteger('id_guru');
            $table->unsignedBigInteger('id_tahun_ajaran');

            $table->foreign('id_tingkat')->references('id')->on('ref_tingkat')->cascadeOnDelete();
            $table->foreign('id_guru')->references('id')->on('ref_guru')->cascadeOnDelete();
            $table->foreign('id_tahun_ajaran')->references('id')->on('ref_tahun_ajaran')->cascadeOnDelete();
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
