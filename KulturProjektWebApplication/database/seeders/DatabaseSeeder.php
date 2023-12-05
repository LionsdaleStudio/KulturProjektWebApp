<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            RoleSeeder::class
        );

        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Dev Admin',
            'email' => 'test@example.com',
        ]);

        $this->call(
            [
                EventSeeder::class,
                ReviewSeeder::class,
            ]
        );
    }
}
