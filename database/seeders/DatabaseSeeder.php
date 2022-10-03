<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        $editors = User::factory(5)->editor()->create();
        User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
        ]);

        foreach ( $editors as $editor) {
            Article::factory()->count(5)->randomPublished()->for($editor)->create();
        }
    }
}
