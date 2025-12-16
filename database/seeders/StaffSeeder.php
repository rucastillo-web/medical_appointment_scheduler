<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staffMembers = [
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'role' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('password123'),
            ],
            [
                'first_name' => 'Dr. John',
                'last_name' => 'Smith',
                'role' => 'doctor',
                'username' => 'dr_smith',
                'password' => bcrypt('password123'),
            ],
            [
                'first_name' => 'Dr. Sarah',
                'last_name' => 'Johnson',
                'role' => 'doctor',
                'username' => 'dr_johnson',
                'password' => bcrypt('password123'),
            ],
            [
                'first_name' => 'Reception',
                'last_name' => 'Specialist',
                'role' => 'receptionist',
                'username' => 'receptionist1',
                'password' => bcrypt('password123'),
            ],
            [
                'first_name' => 'Maria',
                'last_name' => 'Garcia',
                'role' => 'receptionist',
                'username' => 'receptionist2',
                'password' => bcrypt('password123'),
            ],
        ];

        foreach ($staffMembers as $staff) {
            Staff::create($staff);
        }
    }
}
