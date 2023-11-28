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
        $services = [
            // [
            //     'name' => 'Service 1',
            //     'description' => 'Desc 1',
            //     'price' => 1000
            // ],
            // [
            //     'name' => 'Service 2',
            //     'description' => 'Desc 2',
            //     'price' => 2000
            // ],
            // [
            //     'name' => 'Service 3',
            //     'description' => 'Desc 3',
            //     'price' => 3000
            // ],
            // [
            //     'name' => 'Service 4',
            //     'description' => 'Desc 4',
            //     'price' => 4000
            // ],
            // [
            //     'name' => 'Service 5',
            //     'description' => 'Desc 5',
            //     'price' => 5000
            // ],
            // [
            //     'name' => 'Service 6',
            //     'description' => 'Desc 6',
            //     'price' => 6000
            // ],
            // [
            //     'name' => 'Service 7',
            //     'description' => 'Desc 7',
            //     'price' => 7000
            // ],
            // [
            //     'name' => 'Service 8',
            //     'description' => 'Desc 8',
            //     'price' => 8000
            // ],
            // [
            //     'name' => 'Service 9',
            //     'description' => 'Desc 9',
            //     'price' => 9000
            // ],
            // [
            //     'name' => 'Service 10',
            //     'description' => 'Desc 10',
            //     'price' => 10000
            // ],
            [
                'name' => 'Make Up Pernikahan',
                'description' => 'Pada hari pernikahan yang begitu istimewa, tampil sempurna adalah impian setiap mempelai. Tata rias pernikahan menjadi kunci utama untuk menonjolkan kecantikan alami dan memancarkan kebahagiaan dalam setiap senyuman.',
                'price' => 300000
            ],
        ];

        foreach ($services as $key => $value) {
            Service::create($value);
        }
    }
}
