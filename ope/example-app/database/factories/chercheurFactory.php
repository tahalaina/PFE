<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\chercheur>
 */
class chercheurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'img' => $this->faker->imageUrl("{{ asset('img/acceuil.jpg') }}"), // Image URL fictive
            'nom_complet' => $this->faker->name(),
            'titre' => $this->faker->jobTitle(),
            'affiliation_institutionnelle' => $this->faker->company(),
            'departement' => $this->faker->word(),
            'adresse_email' => $this->faker->unique()->safeEmail(),
            'numero_telephone' => $this->faker->phoneNumber(),
            'domaine_recherche' => $this->faker->word(),
            'formation_doctorale' => $this->faker->sentence(),
            'specialite' => $this->faker->word(),
            'projets_en_cours' => $this->faker->paragraph(),
            'publications' => $this->faker->paragraph(),
            'competences_techniques' => $this->faker->paragraph(),
            'liens_sociaux_academiques' => $this->faker->url(),
            'disponibilite' => json_encode(['Lundi' => '9h00 - 17h00', 'Mardi' => '9h00 - 17h00']), // Exemple de disponibilité sous forme JSON
            'preferences_contact' => $this->faker->sentence(),
            'role' => 'user',
        ];
    }
}
