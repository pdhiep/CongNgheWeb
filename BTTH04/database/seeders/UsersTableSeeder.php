<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach(range(1, 50) as $index){
            DB::table('users')->insert([
                'username' => $faker->userName(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('123456'), 
              
                'role' => $faker->randomElement(['admin', 'user', 'moderator']),
                
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}