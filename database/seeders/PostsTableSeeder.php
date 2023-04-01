<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $users = User::all();

        foreach ($users as $user) {
            $num_posts = rand(1, 5); // Generate a random number of posts per user
            Post::factory()->count($num_posts)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
