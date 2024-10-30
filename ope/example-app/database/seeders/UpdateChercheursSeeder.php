<?php

namespace Database\Seeders;

use App\Models\chercheur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateChercheursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        chercheur::whereNull('password')->update(['password' => '123456789taha']);
   
    }
}
