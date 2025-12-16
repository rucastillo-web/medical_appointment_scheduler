<?php

namespace Database\Seeders;

use App\Models\Reminder;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReminderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reminders = [
            // Appointment 1 reminders
            [
                'appointment_id' => 1,
                'reminder_datetime' => Carbon::now()->addDays(1)->setHour(9)->setMinute(0)->setSecond(0),
                'reminder_type' => 'email',
                'status' => 'pending',
            ],
            [
                'appointment_id' => 1,
                'reminder_datetime' => Carbon::now()->addHours(23)->setHour(17)->setMinute(0)->setSecond(0),
                'reminder_type' => 'sms',
                'status' => 'pending',
            ],

            // Appointment 2 reminders
            [
                'appointment_id' => 2,
                'reminder_datetime' => Carbon::now()->addDays(2)->setHour(13)->setMinute(0)->setSecond(0),
                'reminder_type' => 'email',
                'status' => 'pending',
            ],
            [
                'appointment_id' => 2,
                'reminder_datetime' => Carbon::now()->addDays(1)->setHour(14)->setMinute(30)->setSecond(0),
                'reminder_type' => 'notification',
                'status' => 'pending',
            ],

            // Appointment 3 reminders
            [
                'appointment_id' => 3,
                'reminder_datetime' => Carbon::now()->addDays(3)->setHour(10)->setMinute(0)->setSecond(0),
                'reminder_type' => 'sms',
                'status' => 'pending',
            ],
            [
                'appointment_id' => 3,
                'reminder_datetime' => Carbon::now()->addDays(2)->setHour(11)->setMinute(0)->setSecond(0),
                'reminder_type' => 'email',
                'status' => 'pending',
            ],

            // Appointment 4 reminders
            [
                'appointment_id' => 4,
                'reminder_datetime' => Carbon::now()->addDays(4)->setHour(14)->setMinute(0)->setSecond(0),
                'reminder_type' => 'notification',
                'status' => 'pending',
            ],
            [
                'appointment_id' => 4,
                'reminder_datetime' => Carbon::now()->addDays(3)->setHour(15)->setMinute(0)->setSecond(0),
                'reminder_type' => 'email',
                'status' => 'pending',
            ],

            // Appointment 5 reminders
            [
                'appointment_id' => 5,
                'reminder_datetime' => Carbon::now()->addDays(5)->setHour(8)->setMinute(30)->setSecond(0),
                'reminder_type' => 'sms',
                'status' => 'pending',
            ],
            [
                'appointment_id' => 5,
                'reminder_datetime' => Carbon::now()->addDays(4)->setHour(9)->setMinute(30)->setSecond(0),
                'reminder_type' => 'email',
                'status' => 'pending',
            ],

            // Appointment 6 reminders (completed)
            [
                'appointment_id' => 6,
                'reminder_datetime' => Carbon::now()->subDays(2)->setHour(9)->setMinute(0)->setSecond(0),
                'reminder_type' => 'email',
                'status' => 'sent',
            ],

            // Appointment 7 reminders (completed)
            [
                'appointment_id' => 7,
                'reminder_datetime' => Carbon::now()->subDays(3)->setHour(13)->setMinute(0)->setSecond(0),
                'reminder_type' => 'sms',
                'status' => 'sent',
            ],

            // Appointment 10 reminders
            [
                'appointment_id' => 10,
                'reminder_datetime' => Carbon::now()->addDays(6)->setHour(9)->setMinute(0)->setSecond(0),
                'reminder_type' => 'email',
                'status' => 'pending',
            ],
            [
                'appointment_id' => 10,
                'reminder_datetime' => Carbon::now()->addDays(5)->setHour(10)->setMinute(0)->setSecond(0),
                'reminder_type' => 'notification',
                'status' => 'pending',
            ],
        ];

        foreach ($reminders as $reminder) {
            Reminder::create($reminder);
        }
    }
}
