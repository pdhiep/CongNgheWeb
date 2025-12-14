<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Movie;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $cinemaIds = Cinema::pluck('id')->toArray();
        foreach(range(1,30) as $index){
            Movie::create([
                'title'=>"Phim " . $faker ->sentence(3),
                'director' => $faker ->name(),
                'release_date' => $faker ->date(),
                'duration' => $faker->numberBetween(90,180),
                'cinema_id' => $faker->randomElement($cinemaIds),
                  
            ]);
        }
    }
}
