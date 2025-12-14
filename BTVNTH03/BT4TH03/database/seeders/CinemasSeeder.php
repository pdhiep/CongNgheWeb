<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Cinema;
class CinemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach((range(1,5)) as $index){
            Cinema::create([
                'name'=>'CGV' . $faker->city(),
                'location'=>$faker->address(),
                'total_seats'=>$faker->numberBetween(100,500),
            ]

            );
        }
    }
}
