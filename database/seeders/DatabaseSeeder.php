<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'First User',
            'email' => 'firstuser@example.com',
            'phone' => '01234567891'
        ]);

        User::factory()->create([
            'name' => 'Second User',
            'email' => 'seconduser@example.com',
            'phone' => '01234567892'
        ]);

        Admin::create([
            'name' => 'Admin User',
            'password' => Hash::make('password'),
            'phone' => '01234567893'
        ]);

        Student::create([
            'name' => 'First Student',
            'password' => Hash::make('password'),
            'phone' => '01234567894'
        ]);

        Student::create([
            'name' => 'Second Student',
            'password' => Hash::make('password'),
            'phone' => '01234567895'
        ]);
    }
}
