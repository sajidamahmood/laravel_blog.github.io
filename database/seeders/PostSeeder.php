<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::factory(10)->create();
          DB::table('posts')->insert([
            'user_id'=> User::all()->random()->id,
            'title' => 'the title',
            'description' => 'my first blog',
            'content' => 'reqiuired',
            'image' => 'images/default.jpg',
        ]);
    }
}
