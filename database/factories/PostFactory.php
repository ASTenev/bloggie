<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(rand(3, 10), true),
            'publish_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'image' => $this->faker->imageUrl(),
            'user_id' => User::factory(),
        ];
    }
}
