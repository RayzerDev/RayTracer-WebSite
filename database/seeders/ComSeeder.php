<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commentaire::factory(30)->create();
    }
}
