<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
use Faker\Factory as faker;
class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
{
    $faker = Faker::create();
    $computerIds = DB::table('computers')->pluck('id'); // Lấy danh sách ID máy tính

    foreach (range(1, 50) as $index) {
        DB::table('issues')->insert([
            'computer_id' => $faker->randomElement($computerIds),
            'reported_by' => $faker->name(),
            'reported_date' => $faker->dateTimeBetween('-1 month', 'now'),
            'description' => $faker->sentence(10),
            'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
            'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
}
