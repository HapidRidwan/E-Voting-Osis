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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('nomor_urut')->unique();

            $table->string('ketua',100);
            $table->string('wakil',100);

            $table->string('foto_ketua')->nullable();
            $table->string('foto_wakil')->nullable();

            $table->longText('visi');
            $table->longText('misi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};