<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed staff first
        $this->call(StaffSeeder::class);

        // Seed doctors
        $this->call(DoctorSeeder::class);

        // Seed patients
        $this->call(PatientSeeder::class);

        // Seed doctor availabilities
        $this->call(AvailabilitySeeder::class);

        // Seed appointments
        $this->call(AppointmentSeeder::class);

        // Seed visit logs
        $this->call(VisitLogSeeder::class);

        // Seed reminders
        $this->call(ReminderSeeder::class);
    }
}
