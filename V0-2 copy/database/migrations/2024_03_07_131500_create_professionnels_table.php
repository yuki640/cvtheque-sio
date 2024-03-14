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
        Schema::create('professionnels', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID du professionnel');
            $table->string('prenom', 25)->comment('Prénom du professionnel');
            $table->string('nom', 40)->comment('Nom du professionnel');
            $table->string('cp', 5)->comment('Code postal du professionnel');
            $table->string('ville', 38)->comment('Ville du professionnel');
            $table->string('telephone', 14)->comment('telephone du professionnel');
            $table->string('email', 191)->unique()->comment('email du professionnel');
            $table->date('naissance')->comment('Date de naissance du professionnel');
            $table->boolean('formation')->comment('activiter de formation deja fait oui non');
            $table->set('domaine', ['S', 'R', 'D'])->comment('domlaine d\'activité du professionnel');
            $table->string('source', 191)->nullable()->comment('source du professionnel');
            $table->text('observation')->nullable()->comment('Observation ou commentaire ');
            $table->timestamps();
            $table->unsignedBigInteger('metier_id');
            $table->foreign('metier_id')->references('id')->on('metiers')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professionnels');
    }
};
