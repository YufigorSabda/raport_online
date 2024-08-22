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
        Schema::create('ref_sekolah_kepala', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sekolah');
            $table->string('nip', 30);
            $table->string('gelar_depan', 50);
            $table->string('gelar_belakang', 50);
            $table->string('nama', 100);

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
