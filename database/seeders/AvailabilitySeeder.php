<?php

namespace Database\Seeders;

use App\Models\Availability;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $availabilities = [
            // Dr. Smith (Doctor ID 1) - Cardiology
            [
                'doctor_id' => 1,
                'available_date' => Carbon::now()->addDay()->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'doctor_id' => 1,
                'available_date' => Carbon::now()->addDay()->format('Y-m-d'),
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'doctor_id' => 1,
                'available_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],

            // Dr. Johnson (Doctor ID 2) - Pediatrics
            [
                'doctor_id' => 2,
                'available_date' => Carbon::now()->addDay()->format('Y-m-d'),
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'doctor_id' => 2,
                'available_date' => Carbon::now()->addDay()->format('Y-m-d'),
                'start_time' => '15:00:00',
                'end_time' => '18:00:00',
            ],
            [
                'doctor_id' => 2,
                'available_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],

            // Dr. Brown (Doctor ID 3) - Orthopedics
            [
                'doctor_id' => 3,
                'available_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'start_time' => '08:00:00',
                'end_time' => '11:00:00',
            ],
            [
                'doctor_id' => 3,
                'available_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
            ],
            [
                'doctor_id' => 3,
                'available_date' => Carbon::now()->addDays(4)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],

            // Dr. Davis (Doctor ID 4) - Dermatology
            [
                'doctor_id' => 4,
                'available_date' => Carbon::now()->addDay()->format('Y-m-d'),
                'start_time' => '11:00:00',
                'end_time' => '14:00:00',
            ],
            [
                'doctor_id' => 4,
                'available_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'doctor_id' => 4,
                'available_date' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
            ],

            // Dr. Wilson (Doctor ID 5) - Neurology
            [
                'doctor_id' => 5,
                'available_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
            ],
            [
                'doctor_id' => 5,
                'available_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'doctor_id' => 5,
                'available_date' => Carbon::now()->addDays(4)->format('Y-m-d'),
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
            ],

            // Dr. Martinez (Doctor ID 6) - Oncology
            [
                'doctor_id' => 6,
                'available_date' => Carbon::now()->addDay()->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'doctor_id' => 6,
                'available_date' => Carbon::now()->addDays(4)->format('Y-m-d'),
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
            ],
            [
                'doctor_id' => 6,
                'available_date' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],
        ];

        foreach ($availabilities as $availability) {
            Availability::create($availability);
        }
    }
}
