<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItCenter; // <--- QUAN TRỌNG
use Faker\Factory as Faker;

class ItCenterSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        foreach (range(1, 5) as $index) {
            ItCenter::create([
                'name' => 'Trung tâm Tin học ' . $faker->companySuffix(), // VD: Trung tâm Tin học ABC
                'location' => $faker->address(),
                'contact_email' => $faker->email(),
            ]);
        }
    }
}