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
        Schema::create('metiers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('libelle', 120);
            $table->string('description', 255);
            $table->string('slug', 120)->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metiers');
    }
};
