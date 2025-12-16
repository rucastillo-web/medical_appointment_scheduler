<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $patients = [
            [
                'first_name' => 'James',
                'last_name' => 'Anderson',
                'date_of_birth' => '1980-05-15',
                'gender' => 'male',
                'phone_number' => '555-1001',
                'email' => 'james.anderson@email.com',
                'address' => '123 Main St, Anytown, USA',
            ],
            [
                'first_name' => 'Patricia',
                'last_name' => 'Taylor',
                'date_of_birth' => '1992-08-22',
                'gender' => 'female',
                'phone_number' => '555-1002',
                'email' => 'patricia.taylor@email.com',
                'address' => '456 Oak Ave, Somewhere, USA',
            ],
            [
                'first_name' => 'Christopher',
                'last_name' => 'Thomas',
                'date_of_birth' => '1988-03-10',
                'gender' => 'male',
                'phone_number' => '555-1003',
                'email' => 'christopher.thomas@email.com',
                'address' => '789 Pine Rd, Elsewhere, USA',
            ],
            [
                'first_name' => 'Linda',
                'last_name' => 'Jackson',
                'date_of_birth' => '1975-11-05',
                'gender' => 'female',
                'phone_number' => '555-1004',
                'email' => 'linda.jackson@email.com',
                'address' => '321 Elm St, Nowhere, USA',
            ],
            [
                'first_name' => 'Richard',
                'last_name' => 'White',
                'date_of_birth' => '1985-07-18',
                'gender' => 'male',
                'phone_number' => '555-1005',
                'email' => 'richard.white@email.com',
                'address' => '654 Maple Ave, Anyplace, USA',
            ],
            [
                'first_name' => 'Mary',
                'last_name' => 'Harris',
                'date_of_birth' => '1990-01-25',
                'gender' => 'female',
                'phone_number' => '555-1006',
                'email' => 'mary.harris@email.com',
                'address' => '987 Birch Ln, Somewhere Else, USA',
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Martin',
                'date_of_birth' => '1978-09-12',
                'gender' => 'male',
                'phone_number' => '555-1007',
                'email' => 'david.martin@email.com',
                'address' => '159 Cedar Dr, New City, USA',
            ],
            [
                'first_name' => 'Jennifer',
                'last_name' => 'Garcia',
                'date_of_birth' => '1995-04-30',
                'gender' => 'female',
                'phone_number' => '555-1008',
                'email' => 'jennifer.garcia@email.com',
                'address' => '753 Spruce Ct, Old Town, USA',
            ],
            [
                'first_name' => 'Charles',
                'last_name' => 'Rodriguez',
                'date_of_birth' => '1982-06-08',
                'gender' => 'male',
                'phone_number' => '555-1009',
                'email' => 'charles.rodriguez@email.com',
                'address' => '852 Walnut Way, Big City, USA',
            ],
            [
                'first_name' => 'Karen',
                'last_name' => 'Lee',
                'date_of_birth' => '1987-12-20',
                'gender' => 'female',
                'phone_number' => '555-1010',
                'email' => 'karen.lee@email.com',
                'address' => '456 Poplar Pl, Small Town, USA',
            ],
        ];

        foreach ($patients as $patient) {
            Patient::create($patient);
        }
    }
}
