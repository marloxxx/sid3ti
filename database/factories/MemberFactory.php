<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'nim' => $this->faker->unique()->randomNumber(8),
            'gender' => $this->faker->randomElement(['Men', 'Women']),
            'date_of_birth' => $this->faker->date,
            'photo' => $this->faker->imageUrl(),
            'family' => $this->faker->word,
            'instagram' => $this->faker->userName,
        ];
    }
}
