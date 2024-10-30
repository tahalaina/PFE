<?php

namespace Database\Seeders;

use App\Models\equipement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        equipement::factory(10)->create();
    }
}
