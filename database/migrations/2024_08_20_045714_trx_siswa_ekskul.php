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
        Schema::create('trx_siswa_ekskul', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_ekskul');
            $table->decimal('nilai');

            $table->foreign('id_siswa')->references('id')->on('ref_siswa')->cascadeOnDelete();
            $table->foreign('id_ekskul')->references('id')->on('ref_ekskul')->cascadeOnDelete();
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
