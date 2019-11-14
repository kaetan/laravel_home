<?php

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
        factory(App\User::class, 5)->create();

        factory(App\Article::class, 5)->create()->each(function ($article) {
            $comments = factory(App\Comment::class, 5)->make();
            $article->comments()->saveMany($comments);
        });
    }
}
