<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            Post::create([
                'user_id' => rand(1,19),
                'title' => "Post title {$i}",
                'content' => Str::random(50),
                'is_active' => rand(0,1)
            ]);
        }
    }
}
