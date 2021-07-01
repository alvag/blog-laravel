<?php

use App\Post;
use App\Category;
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
        $categories = factory(Category::class, 10)->create();

        factory(Post::class, 50)
            ->make()
            ->each(function ($post) use ($categories) {
                $category = $categories->random();

                $post->category_id = $category->id;

                $post->save();
            });
    }
}
