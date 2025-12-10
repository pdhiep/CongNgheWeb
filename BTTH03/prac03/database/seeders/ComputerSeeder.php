<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Computer;
use Faker\Factory as Faker;

class ComputerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 40) as $i) {
            Computer::create([
                'computer_name'     => "Lab" . $faker->numberBetween(1,4) . "-PC" . str_pad($i, 2, '0', STR_PAD_LEFT),
                'model'             => $faker->randomElement(['Dell Optiplex 7090', 'HP ProDesk 400', 'Lenovo ThinkCentre M70', 'Asus ExpertCenter']),
                'operating_system'  => $faker->randomElement(['Windows 10 Pro', 'Windows 11 Pro', 'Ubuntu 22.04']),
                'processor'         => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-12700', 'AMD Ryzen 5 5600G']),
                'memory'            => $faker->randomElement([8, 16, 32]),
                'available'         => $faker->boolean(85), // 85% đang hoạt động
            ]);
        }
    }
}