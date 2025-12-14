<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laptop;
use App\Models\Renter;
use Faker\Factory as Faker;

class LaptopSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        // Lấy danh sách ID người thuê để gán khóa ngoại
        $renterIds = Renter::pluck('id')->toArray();

        foreach (range(1, 30) as $index) {
            Laptop::create([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Lenovo', 'Asus', 'MacBook']),
                'model' => $faker->bothify('Model-###??'), // Sinh chuỗi ngẫu nhiên kiểu Model-123XY
                'specifications' => $faker->randomElement([
                    'i5, 8GB RAM, 256GB SSD', 
                    'i7, 16GB RAM, 512GB SSD', 
                    'Ryzen 5, 8GB RAM, 512GB SSD'
                ]),
                'rental_status' => true, // Giả sử đang được thuê
                'renter_id' => $faker->randomElement($renterIds),
            ]);
        }
    }
}