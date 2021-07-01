<?php

use App\Post;
use App\Category;
use App\Tag;
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
        $tags = factory(Tag::class, 10)->create();

        factory(Post::class, 50)
            ->make()
            ->each(function ($post) use ($categories, $tags) {
                $category = $categories->random();
                $tag = $tags->random();

                $post->category_id = $category->id;

                $post->save();

                // $post->tags()->attach([$post->id, $tag->id]);

                $post->tags()->sync([$tags->random()->id, $tags->random()->id]);
            });
    }
}
