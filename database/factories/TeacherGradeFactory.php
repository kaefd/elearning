<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherGrade>
 */
class TeacherGradeFactory extends Factory
{
    /**
     * Define the model's default state.

     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'teacher_id'    =>  fake()->unique->numberBetween(1,50),
            'grade_id'      =>  mt_rand(1,3)
        ];
    }
}
