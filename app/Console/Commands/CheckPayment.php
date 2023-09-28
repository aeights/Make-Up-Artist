<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Illuminate\Console\Command;

class CheckPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check appointment';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $appointments = Appointment::where('status', 'Pending')
        ->where('appointment_time', '<', now()->subHours(2)) // Appointment yang belum dibayar selama dua jam
        ->get();

        foreach ($appointments as $appointment) {
            // Ubah status appointment menjadi 'Rejected'
            $appointment->update(['status' => 'Rejected']);
        }
    }
}
