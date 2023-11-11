<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $gender = $this->faker->randomElement(['Male', 'Female']);
        $orient = $gender == 'Male' ? $this->faker->randomElement(['Heterosexual', 'Gay']) : $this->faker->randomElement(['Heterosexual', 'Lesbian']);
        $country = $this->faker->randomElement(['United States', 'Canada']);
        $ethnicity = $country == 'United States of America' ? 'American' : $this->faker->randomElement(['Asian']);

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),

            'phone_number' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->dateTimeThisCentury(),
            'gender' => $gender, //$this->faker->randomElement(['Male', 'Female']),
            'orientation' => $orient, // $this->faker->randomElement(['Lesbian', 'Heterosexual', 'Gay']),
            'relationship_status' => $this->faker->randomElement(['Single', 'Divorced']),
            'looking_for' => $this->faker->randomElement(['Marriage', 'Hang out buddy', 'Friends with benefit', 'Platonic relationship']),
            'children' => $this->faker->randomElement(['Yes, independent', 'Yes', 'No']),

            'height' => $this->faker->randomElement(["4ft - 4'5ft", "4'6ft - 5'5ft", "5'5ft - 6ft", "6ft - 6'5ft", "6'5 above"]),
            'weight' => $this->faker->numberBetween(80, 200),
            'body_type' => $this->faker->randomElement(['Slim', 'Petite', 'Muscular', 'Fat', 'Chubby']),
            'hair_color' => $this->faker->randomElement(['Black', 'Blonde', 'Brunette', 'Red']),
            'eye_color' => $this->faker->randomElement(['Black', 'Brown', 'Blue', 'Green', 'Hazel']),
            'ethnicity' => $ethnicity,
            'zodiac_sign' => $this->faker->randomElement(['Capricon', 'Libra', 'Sagittarius', 'Cancer', 'Gemini', 'Leo', 'Aquarius', 'Taurus', 'Pisces', 'Virgo', 'Aries', 'Scorpio']),
            'religion' => $this->faker->randomElement(['Christian', 'Muslim', 'Atheist', 'Jewish', 'Hindu', 'Buddhist', 'Agnostic', 'Atheist']),
            'activity_level' => $this->faker->randomElement(['Once a year', 'A couple times a week', "Daily fitness", "Couch potato"]),

            'first_language' => $this->faker->randomElement(['English', 'Spanish']),
            'second_language' => $this->faker->randomElement(['French', 'Chinese', 'Spanish', 'English']),
            'employed' => $this->faker->randomElement(['Employed', 'Unemployed', 'Retired', 'Self-employed', 'Student']),
            'profession' => $this->faker->randomElement(['Teacher', 'Bussiness Man']),
            'education' => $this->faker->randomElement(['Bachelors', 'Masters', "Post-graduate", "Some college"]),

            'pets' => $this->faker->randomElement(['Yes', 'No']),
            'smokes' => $this->faker->randomElement(['Yes', 'No']),
            'drinks' => $this->faker->randomElement(['Yes, once a week', 'Yes, Socially', 'No']),
            'drugs' => $this->faker->randomElement(['Yes', 'No']),
            'city' => $this->faker->randomElement(['Florida', 'Chicago', 'Ohio']),
            'country' => $country,
            'how_jelly' => $this->faker->randomElement(['Yes', 'No']),
            'extra' => $this->faker->paragraph(6),
            'subscription' => $this->faker->randomElement(['Free', 'Basic', 'Premium']),

            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
