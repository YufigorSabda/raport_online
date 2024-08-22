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
        Schema::create('ref_sekolah_kontak', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sekolah');
            $table->string('nomor_telepon', 30);
            $table->string('nomor_fax', 30);
            $table->string('email', 100);
            $table->string('website', 100);

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
