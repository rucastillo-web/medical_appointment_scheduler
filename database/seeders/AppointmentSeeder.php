<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointments = [
            [
                'patient_id' => 1,
                'doctor_id' => 1,
                'created_by_staff_id' => 4,
                'updated_by_staff_id' => null,
                'appointment_datetime' => Carbon::now()->addDays(1)->setHour(10)->setMinute(0)->setSecond(0),
                'status' => 'scheduled',
                'notes' => 'Initial consultation for heart condition',
            ],
            [
                'patient_id' => 2,
                'doctor_id' => 2,
                'created_by_staff_id' => 4,
                'updated_by_staff_id' => null,
                'appointment_datetime' => Carbon::now()->addDays(2)->setHour(14)->setMinute(30)->setSecond(0),
                'status' => 'scheduled',
                'notes' => 'Child checkup',
            ],
            [
                'patient_id' => 3,
                'doctor_id' => 3,
                'created_by_staff_id' => 5,
                'updated_by_staff_id' => null,
                'appointment_datetime' => Carbon::now()->addDays(3)->setHour(11)->setMinute(0)->setSecond(0),
                'status' => 'scheduled',
                'notes' => 'Knee pain evaluation',
            ],
            [
                'patient_id' => 4,
                'doctor_id' => 4,
                'created_by_staff_id' => 4,
                'updated_by_staff_id' => null,
                'appointment_datetime' => Carbon::now()->addDays(4)->setHour(15)->setMinute(0)->setSecond(0),
                'status' => 'scheduled',
                'notes' => 'Skin consultation',
            ],
            [
                'patient_id' => 5,
                'doctor_id' => 5,
                'created_by_staff_id' => 5,
                'updated_by_staff_id' => null,
                'appointment_datetime' => Carbon::now()->addDays(5)->setHour(9)->setMinute(30)->setSecond(0),
                'status' => 'scheduled',
                'notes' => 'Headache assessment',
            ],
            [
                'patient_id' => 6,
                'doctor_id' => 1,
                'created_by_staff_id' => 4,
                'updated_by_staff_id' => null,
                'appointment_datetime' => Carbon::now()->subDays(1)->setHour(10)->setMinute(0)->setSecond(0),
                'status' => 'completed',
                'notes' => 'Annual checkup completed',
            ],
            [
                'patient_id' => 7,
                'doctor_id' => 2,
                'created_by_staff_id' => 5,
                'updated_by_staff_id' => null,
                'appointment_datetime' => Carbon::now()->subDays(2)->setHour(14)->setMinute(0)->setSecond(0),
                'status' => 'completed',
                'notes' => 'Vaccination appointment',
            ],
            [
                'patient_id' => 8,
                'doctor_id' => 3,
                'created_by_staff_id' => 4,
                'updated_by_staff_id' => null,
                'appointment_datetime' => Carbon::now()->subDays(3)->setHour(11)->setMinute(0)->setSecond(0),
                'status' => 'cancelled',
                'notes' => 'Patient requested cancellation',
            ],
            [
                'patient_id' => 9,
                'doctor_id' => 4,
                'created_by_staff_id' => 5,
                'updated_by_staff_id' => null,
                'appointment_datetime' => Carbon::now()->subDays(4)->setHour(15)->setMinute(0)->setSecond(0),
                'status' => 'no-show',
                'notes' => 'Patient did not show up',
            ],
            [
                'patient_id' => 10,
                'doctor_id' => 5,
                'created_by_staff_id' => 4,
                'updated_by_staff_id' => null,
                'appointment_datetime' => Carbon::now()->addDays(6)->setHour(10)->setMinute(0)->setSecond(0),
                'status' => 'scheduled',
                'notes' => 'Follow-up consultation',
            ],
        ];

        foreach ($appointments as $appointment) {
            Appointment::create($appointment);
        }
    }
}
