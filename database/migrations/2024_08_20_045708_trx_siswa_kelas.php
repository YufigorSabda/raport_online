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
        Schema::create('trx_siswa_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_kelas');
            $table->integer('count_sakit')->default(0);
            $table->integer('count_izin')->default(0);
            $table->integer('count_alpha')->default(0);
            $table->text('catatan_ts');
            $table->text('catatan_as');
            $table->string('raport', 50);

            $table->foreign('id_siswa')->references('id')->on('ref_siswa')->cascadeOnDelete();
            $table->foreign('id_kelas')->references('id')->on('ref_kelas')->cascadeOnDelete();
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
