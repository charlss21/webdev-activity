<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::factory(1000)->create();
            Student::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'middlename' => 'Smith',
            'age' => 20,
            'gender' => 'male',
            'address' => '123 Main Street'
            ]);
            Student::create([
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'middlename' => 'Smith',
            'age' => 21,
            'gender' => 'female',
            'address' => '456 Main Street'
            ]);
            Student::create([
            'firstname' => 'Bob',
            'lastname' => 'Smith',
            'middlename' => 'John',
            'age' => 22,
            'gender' => 'male',
            'address' => '789 Main Street'
            ]);
    }
}