<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory(5)->editor()->create();
        \App\Models\User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
        ]);

        $this->call([
            ArticleSeeder::class,
        ]);
    }
}
