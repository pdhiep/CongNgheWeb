<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Library;
use Faker\Factory as Faker;

class LibrarySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        foreach (range(1, 5) as $index) {
            Library::create([
                'name' => 'Thư viện ' . $faker->company(),
                'address' => $faker->address(),
                'contact_number' => $faker->phoneNumber(),
            ]);
        }
    }
}