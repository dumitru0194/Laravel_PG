<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  \App\Models\User::factory(10)->create()->each(function ($user){

        //     $user->posts()->save(factory('\App\Models\Post')->make());

        //  });

        User::factory(10)->create()->each(function ($user) {
            $user->posts()->save(Post::factory()->make());
        });
    }
}
