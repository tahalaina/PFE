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
        Schema::create('chercheurs', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('nom_complet', 255);
            $table->string('titre', 255);
            $table->string('affiliation_institutionnelle', 255);
            $table->string('departement', 255);
            $table->string('adresse_email', 255)->unique();
            $table->string('numero_telephone', 255);
            $table->string('domaine_recherche', 255);
            $table->string('formation_doctorale', 255);
            $table->string('specialite', 255);
            $table->text('projets_en_cours')->nullable();
            $table->text('publications')->nullable();
            $table->text('competences_techniques')->nullable();
            $table->text('liens_sociaux_academiques')->nullable();
            $table->text('disponibilite')->nullable(); 
            $table->string('preferences_contact', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chercheurs');
    }
};
