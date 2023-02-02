<?php

namespace Database\Seeders;
use \App\Models\User;
use \App\Models\Grade;
use \App\Models\Student;

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
        
        //User::create([
        //    'username'  => 'ikak fadil',
        //    'password'  => 'aaaaa',
        //    'email'     => 'ika@gmail.com',
        //    'role'      => 'student'
        //]);
        
        
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
        
        //Student::create([
        //    'name'          => 'Ika Fadila',
        //    'nis'           => '8670',
        //    'gender'        => 'female',
        //    'birthplace'    => 'Kendal',
        //    'dob'           => '2000-01-04',
        //    'alamat'        => 'Kaliwungu',
        //    'grade_id'      => 1,
        //    'user_id'       => 1
        //]);
        
        
    }
}
