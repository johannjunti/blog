<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds
     */
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();
        foreach($posts as $post){
            $randUser = $users->random(rand(0, $users->count()));
            foreach($randUser as $user){
                Like::factory()->create([
                    'post_id' => $post->id,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
