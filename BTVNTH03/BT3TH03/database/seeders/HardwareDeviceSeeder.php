<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HardwareDevice; // <--- Import Model con
use App\Models\ItCenter;       // <--- Import Model cha
use Faker\Factory as Faker;

class HardwareDeviceSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        // Lấy danh sách ID của các trung tâm đã tạo
        $centerIds = ItCenter::pluck('id')->toArray();

        foreach (range(1, 20) as $index) {
            HardwareDevice::create([
                'device_name' => $faker->randomElement(['Logitech G502', 'DareU EK87', 'Sony Headphone', 'Razer DeathAdder']),
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean(), // Random true/false
                'center_id' => $faker->randomElement($centerIds),
            ]);
        }
    }
}