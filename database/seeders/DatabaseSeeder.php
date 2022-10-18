<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Image;
use App\Models\Tag;
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
        User::factory(5)->editor()->has(
            Article::factory()->count(5)->randomPublished()->has(
                Image::factory()
            )
            )->create();
        User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
        ]);
        Tag::factory(25)->create();
    }
}
