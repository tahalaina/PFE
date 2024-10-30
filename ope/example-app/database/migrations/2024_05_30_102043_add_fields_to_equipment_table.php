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
        Schema::table('equipements', function (Blueprint $table) {
    
            $table->text('description')->nullable();
            $table->string('fabricant', 255)->nullable();
          
            $table->string('numero_serie', 100)->nullable();
            $table->date('date_achat')->nullable();
            $table->string('fournisseur', 255)->nullable();
            $table->string('emplacement', 100)->nullable();
    
            $table->date('date_prochaine_calibration')->nullable();
            $table->string('manuel_utilisateur')->nullable();
            $table->text('precautions_securite')->nullable();
            $table->string('formation_requise')->nullable();
            $table->text('instructions_utilisation')->nullable();
            $table->text('informations_garantie')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipements', function (Blueprint $table) {
      
            $table->dropColumn('description');
            $table->dropColumn('fabricant');
  
            $table->dropColumn('numero_serie');
            $table->dropColumn('date_achat');
            $table->dropColumn('fournisseur');
            $table->dropColumn('emplacement');
        
            $table->dropColumn('date_prochaine_calibration');
            $table->dropColumn('manuel_utilisateur');
            $table->dropColumn('precautions_securite');
            $table->dropColumn('formation_requise');
            $table->dropColumn('instructions_utilisation');
            $table->dropColumn('informations_garantie');
        });
    }
};
