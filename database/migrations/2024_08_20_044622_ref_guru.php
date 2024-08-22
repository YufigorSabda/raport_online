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
        Schema::create('ref_guru', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nik', 50);
            $table->string('gelar_depan', 50);
            $table->string('gelar_belakang', 50);
            $table->unsignedBigInteger('id_ptk');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('id_ptk')->references('id')->on('ref_ptk')->cascadeOnDelete();
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
