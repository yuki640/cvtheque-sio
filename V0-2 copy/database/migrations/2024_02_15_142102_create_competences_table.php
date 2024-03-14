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
        Schema::create('competences', function (Blueprint $table) {
            $table->id()->comment('identifiant d\'une compétence');
            $table->string('intitule', 120)->comment('Nom de la competence');
            $table->text('description')->comment('Court descriptif d\'une competence');
            //timestamps() permet la création de deux rubriques : created_at et updated_ad de type timestanmps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competences');
    }
};
