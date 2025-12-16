<?php

namespace Database\Seeders;

use App\Models\VisitLog;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VisitLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visitLogs = [
            [
                'appointment_id' => 6,
                'visit_datetime' => Carbon::now()->subDays(1)->setHour(10)->setMinute(0),
                'symptoms' => 'Patient reported chest pain and shortness of breath',
                'diagnosis' => 'Mild hypertension, no acute cardiac issues detected',
                'treatment' => 'Prescribed antihypertensive medication, recommended lifestyle changes',
            ],
            [
                'appointment_id' => 7,
                'visit_datetime' => Carbon::now()->subDays(2)->setHour(14)->setMinute(0),
                'symptoms' => 'Routine checkup',
                'diagnosis' => 'Child healthy, normal growth and development',
                'treatment' => 'Administered routine vaccinations as scheduled',
            ],
            [
                'appointment_id' => 9,
                'visit_datetime' => Carbon::now()->subDays(4)->setHour(15)->setMinute(0),
                'symptoms' => 'Skin rash on arms and neck',
                'diagnosis' => 'Contact dermatitis',
                'treatment' => 'Prescribed topical corticosteroid cream, advised to avoid allergens',
            ],
        ];

        foreach ($visitLogs as $log) {
            VisitLog::create($log);
        }
    }
}
