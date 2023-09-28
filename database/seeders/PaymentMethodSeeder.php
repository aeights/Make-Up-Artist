<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::insert([
            [
                'type' => 'BRI',
                'name' => 'Admin',
                'account_number' => '0001'
            ],
            [
                'type' => 'OVO',
                'name' => 'Admin',
                'account_number' => '0002'
            ],
            [
                'type' => 'DANA',
                'name' => 'Admin',
                'account_number' => '0003'
            ],
            [
                'type' => 'GOPAY',
                'name' => 'Admin',
                'account_number' => '0004'
            ],
        ]);
    }
}
