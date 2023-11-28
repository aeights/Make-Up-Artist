<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::create([
            'user_id' => 2,
            'service_id' => 1,
            'date' => Carbon::now(),
            'appointment_time' => Carbon::now(),
            'payment_method_id' => 1,
            'status' => 'Completed'
        ]);
    }
}
