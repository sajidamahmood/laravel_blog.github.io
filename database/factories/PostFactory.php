<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class postFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'user_id'=> User::all()->random()->id,
            'title' => fake()->name(),
            'description' => fake()->sentence(),
            'content' => fake()->text(),
            'image' => 'images/default.jpg',
        ];
    }
}
