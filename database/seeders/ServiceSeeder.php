<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            [
                'name' => 1,
                'description' => 'Desc 1',
                'price' => 1000
            ],
            [
                'name' => 2,
                'description' => 'Desc 2',
                'price' => 2000
            ],
            [
                'name' => 3,
                'description' => 'Desc 3',
                'price' => 3000
            ],
            [
                'name' => 4,
                'description' => 'Desc 4',
                'price' => 4000
            ],
            [
                'name' => 5,
                'description' => 'Desc 5',
                'price' => 5000
            ],
            [
                'name' => 6,
                'description' => 'Desc 6',
                'price' => 6000
            ],
            [
                'name' => 7,
                'description' => 'Desc 7',
                'price' => 7000
            ],
            [
                'name' => 8,
                'description' => 'Desc 8',
                'price' => 8000
            ],
            [
                'name' => 9,
                'description' => 'Desc 9',
                'price' => 9000
            ],
            [
                'name' => 10,
                'description' => 'Desc 10',
                'price' => 10000
            ],
        ]);
    }
}
