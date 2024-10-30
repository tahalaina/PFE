<?php

namespace Database\Seeders;

use App\Models\chercheur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChercheursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        chercheur::factory(10)->create();
    }
}
