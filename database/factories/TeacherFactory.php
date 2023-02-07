<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $g = fake()->randomElement(['laki-laki', 'perempuan']);
        return [
        'name'       => fake()->title($gender = 'male'|'female').fake()->name(),
        'nidn'       => fake()->unique()->nik(),
        'gender'     => $g,
        'birthplace' => fake()->city(),
        'dob'        => fake()->date(),
        'user_id'    => mt_rand(1,50),
        'alamat'     => fake()->address()
        ];
    }
}
