<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin',
                'address' => 'Jember',
                'phone' => '085236',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin'
            ],
            [
                'name' => 'Customer 1',
                'address' => 'Customer 1 address',
                'phone' => '081',
                'email' => 'customer1@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
            [
                'name' => 'Customer 2',
                'address' => 'Customer 2 address',
                'phone' => '082',
                'email' => 'customer2@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
            [
                'name' => 'Customer 3',
                'address' => 'Customer 3 address',
                'phone' => '083',
                'email' => 'customer3@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
            [
                'name' => 'Customer 4',
                'address' => 'Customer 4 address',
                'phone' => '084',
                'email' => 'customer4@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
            [
                'name' => 'Customer 5',
                'address' => 'Customer 5 address',
                'phone' => '085',
                'email' => 'customer5@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
        ]);
    }
}
