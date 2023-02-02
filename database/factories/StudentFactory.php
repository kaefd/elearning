<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $g = fake()->randomElement(['male', 'female']);
        return [
        'name'       => fake()->firstName() . ' ' . fake()->firstName(),
        'nis'        => fake()->unique()->randomNumber(5),
        'gender'     => $g,
        'birthplace' => fake()->city(),
        'dob'        => fake()->date(),
        'user_id'    => mt_rand(1,50),
        'grade_id'   => mt_rand(1,3),
        'alamat'     => fake()->address()
        ];
    }
}
