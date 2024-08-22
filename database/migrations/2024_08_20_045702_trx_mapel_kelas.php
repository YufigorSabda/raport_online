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
        Schema::create('trx_mapel_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mapel');
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_guru');

            $table->foreign('id_mapel')->references('id')->on('ref_mapel')->cascadeOnDelete();
            $table->foreign('id_kelas')->references('id')->on('ref_kelas')->cascadeOnDelete();
            $table->foreign('id_guru')->references('id')->on('ref_guru')->cascadeOnDelete();
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
