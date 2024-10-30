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
        Schema::create('consomables', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('conditionnement')->nullable();;
            $table->string('type')->nullable();;
            $table->text('description')->nullable();
            $table->string('fabricant')->nullable();;
            $table->string('numero_lot')->nullable();;
            $table->date('date_reception')->nullable();;
            $table->date('date_expiration')->nullable();;
            $table->integer('quantite')->nullable();;
            $table->string('conditions_stockage')->nullable();;
            $table->string('fournisseur')->nullable();;
            $table->string('emplacement_stockage')->nullable();;
            $table->string('fds')->nullable(); // Pour le fichier FDS (PDF)
            $table->text('utilisation_prevue')->nullable();
            $table->string('categorie_utilisation')->nullable();;
            $table->text('procedures_elimination')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consomables');
    }
};
