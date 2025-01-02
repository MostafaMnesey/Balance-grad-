<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // إنشاء أطباء
        $doctor1 = User::create([
            'name' => 'Dr. Ahmed Ali',
            'email' => 'dr.ahmed@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'profile_picture' => 'doctor1.png',
        ]);

        $doctor1->doctor()->create([
            'specialization' => 'Psychiatrist',
            'license_number' => '123456',
            'phone_number' => '01012345678',
        ]);

        $doctor2 = User::create([
            'name' => 'Dr. Sara Khaled',
            'email' => 'dr.sara@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'profile_picture' => 'doctor2.png',
        ]);

        $doctor2->doctor()->create([
            'specialization' => 'Addiction Specialist',
            'license_number' => '789012',
            'phone_number' => '01234567890',
        ]);

        // إنشاء مرضى
        $patient1 = User::create([
            'name' => 'Ali Hassan',
            'email' => 'ali@example.com',
            'password' => bcrypt('password'),
            'type' => 'patient',
            'profile_picture' => 'patient1.png',
        ]);

        $patient1->patient()->create([
            'date_of_birth' => '1995-06-15',
            'gender' => 'male',
            'status' => 'under_treatment',
            'adress' => 'Cairo, Egypt',
        ]);

        $patient2 = User::create([
            'name' => 'Mona Youssef',
            'email' => 'mona@example.com',
            'password' => bcrypt('password'),
            'type' => 'patient',
            'profile_picture' => 'patient2.png',
        ]);

        $patient2->patient()->create([
            'date_of_birth' => '1992-09-25',
            'gender' => 'female',
            'status' => 'under_treatment',
            'adress' => 'Alexandria, Egypt',
        ]);
    }
}
