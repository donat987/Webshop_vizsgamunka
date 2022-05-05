<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'email' => $this->faker->freeEmail(),
            'username' => $this->faker->firstName().$this->faker->lastName().$this->faker->numberBetween(0, 9000),
            'picturename' => 'user.png',
            'admin' => '0',
            'genderID' => $this->faker->numberBetween(1, 3),
            'birthdate' => $this->faker->date($format = 'Y-m-d', $max = '2008-01-01'),
            'password' => md5($this->faker->lastName()),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
