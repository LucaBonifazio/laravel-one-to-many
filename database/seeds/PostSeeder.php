<?php

use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = Category::all('id')->all();

        for ($i=0; $i < 100; $i++) {
            $title = $faker->words(rand(3, 7), true);
            Post::create([
                'category_id' => $faker->randomElement($categories)->id,
                'slug'     => Str::slug($title),
                'title'    => $title,
                'image'    => 'https://picsum.photos/id/'. rand(0, 1000) .'/500/400',
                'content'  => $faker->paragraph(rand(1, 10), true),
                'excerpt'  => $faker->paragraph(),
            ]);
        }
    }
}
