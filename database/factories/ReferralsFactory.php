<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Referrals>
 */
class ReferralsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 200),
            'ref_name' => $this->faker->name(),
            'ref_gender' => $this->faker->randomElement(['Male', 'Female']),
            'ref_email' => $this->faker->email(),
            'ref_no' => $this->faker->phoneNumber(),
        ];
    }
}
