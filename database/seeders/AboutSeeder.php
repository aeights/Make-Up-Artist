<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abouts = [
            [
                'title' => 'About Us',
                'description' => 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.'
            ],
            [
                'title' => 'Fast & Free Shipping',
                'description' => 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.'
            ],
            [
                'title' => 'Easy to Shop',
                'description' => 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.'
            ],
            [
                'title' => '24/7 Support',
                'description' => 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.'
            ],
            [
                'title' => 'Hassle Free Returns',
                'description' => 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.'
            ],
        ];

        foreach ($abouts as $key => $value) {
            About::create($value);
        }
    }
}
