<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
use Faker\Factory as faker;
class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,50) as $index){
            DB::table('computers')->insert([
                'computer_name' => 'Lab' . $faker->numberBetween(1, 5) . '-PC' . $faker->numberBetween(1, 20),
            'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre']),
            'operating_system' => 'Windows 10 Pro',
            'processor' => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-10700', 'AMD Ryzen 5']),
            'memory' => $faker->randomElement([8, 16, 32]),
            'available' => $faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),

            ]);
        }
    }
}
