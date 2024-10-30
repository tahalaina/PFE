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
        Schema::table('etudiants', function (Blueprint $table) {
          
            $table->string('img')->nullable();
            $table->string('titre', 255);
            $table->string('affiliation_institutionnelle', 255);
            $table->string('departement', 255);
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
            $table->enum('role', ['user', 'admin'])->default('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('etudiants', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('img');
            $table->dropColumn('titre');
            $table->dropColumn('affiliation_institutionnelle');
            $table->dropColumn('departement');
            $table->dropColumn('numero_telephone');
            $table->dropColumn('domaine_recherche');
            $table->dropColumn('formation_doctorale');
            $table->dropColumn('specialite');
            $table->dropColumn('projets_en_cours');
            $table->dropColumn('publications');
            $table->dropColumn('competences_techniques');
            $table->dropColumn('liens_sociaux_academiques');
            $table->dropColumn('disponibilite');
            $table->dropColumn('preferences_contact');
        });
    }
};
