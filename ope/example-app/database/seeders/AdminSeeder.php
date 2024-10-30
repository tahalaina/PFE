<?php

namespace Database\Seeders;

use App\Models\chercheur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        chercheur::create([
            'img' => 'chemin/vers/une/image',
            'nom_complet' => 'salim ',
            'titre' => 'chercheur',
            'affiliation_institutionnelle' => 'biologie',
            'departement' => 'Microbiologie',
            'adresse_email' => 'admin@gmail.com',
            'numero_telephone' => '0123456789',
            'domaine_recherche' => 'informatique',
            'formation_doctorale' => 'Formation doctorale de l\'administrateur',
            'specialite' => 'Spécialité de l\'administrateur',
            'projets_en_cours' => 'Projets en cours de l\'administrateur',
            'publications' => 'Publications de l\'administrateur',
            'competences_techniques' => 'intellegents',
            'liens_sociaux_academiques' => 'https://www.linkedin.com/in/taha-laina-3550742a4/',
            'disponibilite' => json_encode(['Lundi' => '9h00 - 17h00', 'Mardi' => '9h00 - 17h00']),
            'preferences_contact' => 'email',
            'role' => 'admin', // Rôle de l'administrateur
        ]);
    }
}
