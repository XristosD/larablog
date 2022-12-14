<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;

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
        $authors = User::factory(5)->author()->has(
            Article::factory()->count(15)->randomPublished()->has(
                Image::factory()
            )
        )->create();
        User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
        ]);
        Tag::factory(40)->has(
            Article::factory()->count(5)->randomPublished()
                ->state(new Sequence(
                    ...$authors->map(function ($item) {
                        return ['user_id' => $item->id];
                    })->toArray()
                ))->has(Image::factory())
        )->create();
    }
}
