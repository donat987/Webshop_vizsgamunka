<?php

namespace Database\Factories;

use App\Models\product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => '',
            'point' => $this->faker->numberBetween(3, 5),
            'userID' => User::inRandomOrder()->first()->id,
            'productID' =>  product::inRandomOrder()->first()->id,
        ];
    }
}
