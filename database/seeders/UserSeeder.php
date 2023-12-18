<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
             'nom' => 'NormalUser',
             'email' => 'normaluser@test.fr',
         ]);
        User::factory()->create([
            'nom' => 'AdminUser',
            'email' => 'adminuser@test.fr',
            'admin' => true
        ]);
        User::factory(5)->create();
    }
}
