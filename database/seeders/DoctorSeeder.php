<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            [
                'first_name' => 'John',
                'last_name' => 'Smith',
                'specialty' => 'Cardiology',
                'phone_number' => '555-0101',
                'email' => 'john.smith@hospital.com',
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Johnson',
                'specialty' => 'Pediatrics',
                'phone_number' => '555-0102',
                'email' => 'sarah.johnson@hospital.com',
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Brown',
                'specialty' => 'Orthopedics',
                'phone_number' => '555-0103',
                'email' => 'michael.brown@hospital.com',
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Davis',
                'specialty' => 'Dermatology',
                'phone_number' => '555-0104',
                'email' => 'emily.davis@hospital.com',
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Wilson',
                'specialty' => 'Neurology',
                'phone_number' => '555-0105',
                'email' => 'robert.wilson@hospital.com',
            ],
            [
                'first_name' => 'Jessica',
                'last_name' => 'Martinez',
                'specialty' => 'Oncology',
                'phone_number' => '555-0106',
                'email' => 'jessica.martinez@hospital.com',
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}
