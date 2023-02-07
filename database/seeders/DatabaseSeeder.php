<?php

namespace Database\Seeders;
use \App\Models\User;
use \App\Models\Grade;
use \App\Models\Student;
use \App\Models\Teacher;
use \App\Models\TeacherGrade;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::create([
            'username'  => 'admin',
            'password'  => 'aaaaa',
            'email'     => 'ika@gmail.com',
            'role'      => 'admin'
        ]);
        
        User::factory(50)->create();
        
        Grade::create([
            'grade_name'    => 'X'
        ]);
        
        Grade::create([
            'grade_name'    => 'XI'
        ]);
        
        Grade::create([
            'grade_name'    => 'XII'
        ]);
        
        Student::factory(50)->create();
        Teacher::factory(50)->create();        
        
        
    }
}
