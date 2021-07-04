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

        DB::table('users')->insert([
            'name' => 'Max Alva',
            'email' => 'alva85@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        factory(Post::class, 50)
            ->make()
            ->each(function ($post) use ($categories, $tags) {
                $category = $categories->random();

                $post->category_id = $category->id;
                $post->url = Str::slug($post->title);
                $post->save();

                // $post->tags()->attach([$post->id, $tag->id]);

                $post->tags()->sync([$tags->random()->id, $tags->random()->id]);
            });
    }
}
