<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Tag;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Populate roles
        Blog::factory(20)->create();

        // Populate users
        Tag::factory(10)->create();

        // Get all the roles attaching up to 3 random roles to each user
        $tags = Tag::all();

        // Populate the pivot table
        Blog::all()->each(function ($blog) use ($tags) {
            $blog->tags()->sync(
                $tags->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
