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
        Schema::create('ref_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang', 50);
            $table->string('npsn', 50);
            $table->string('nss', 50);
            $table->string('nama_sekolah', 100);
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
