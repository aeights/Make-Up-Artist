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
                'email' => 'admin@mail.com',
                'password' => Hash::make('111'),
                'role' => 'admin'
            ],
            [
                'name' => 'a cust',
                'address' => 'Cust a address',
                'phone' => '081',
                'email' => 'a@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
            [
                'name' => 'b cust',
                'address' => 'Cust b address',
                'phone' => '082',
                'email' => 'b@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
            [
                'name' => 'c cust',
                'address' => 'Cust c address',
                'phone' => '083',
                'email' => 'c@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
            [
                'name' => 'd cust',
                'address' => 'Cust d address',
                'phone' => '084',
                'email' => 'd@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
            [
                'name' => 'e cust',
                'address' => 'Cust e address',
                'phone' => '085',
                'email' => 'e@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
        ]);
    }
}
