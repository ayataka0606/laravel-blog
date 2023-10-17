<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $tags = Tag::all();
        foreach ($posts as $post) {
            $tagIds = $tags
                ->random(2)
                ->pluck("id")
                ->all();
            $post->tags()->attach($tagIds);
        }
    }
}
