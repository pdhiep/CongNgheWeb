<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Sale;
use Faker\Factory as Faker;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        foreach (range(1, 80) as $index) {
            Sale::create([
                'medicine_id'    => $faker->numberBetween(1, 30),
                'quantity'       => $faker->numberBetween(1, 100),
                'sale_date'      => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'customer_phone' => $faker->optional(0.85)->numerify('09########'), // 85% có số điện thoại
            ]);
        }
    }
}