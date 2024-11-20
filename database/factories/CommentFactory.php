<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'user_id' =>User::inRandomOrder()->first()->id,
            'video_id' => Video::inRandomOrder()->first()->id,
            'comment' => $this->faker->realText(),
        ];
    }
}
