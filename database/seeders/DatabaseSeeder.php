<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Device;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Device::create([
            'name' => 'iPhone 14 Pro Max',
            'color' => 'Black',
            'model' => 2022,
            'type' => 'Smart Phone',
            'brand' => 'Apple',
        ]);

        Device::create([
            'name' => 'Google Pixel 3',
            'color' => 'White',
            'model' => 2021,
            'type' => 'Smart Phone',
            'brand' => 'Google',
        ]);
    }
}
