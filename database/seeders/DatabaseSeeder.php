<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'lastname' => 'Test',
            'firstname' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);


        User::factory()->create([
            'lastname' => 'Test',
            'firstname' => 'User',
            'email' => 'user@example.com',
            'role' => 'user',
        ]);

        $this->call([
            CategorySeeder::class,
            ArticleSeeder::class,
        ]);


    }
}
