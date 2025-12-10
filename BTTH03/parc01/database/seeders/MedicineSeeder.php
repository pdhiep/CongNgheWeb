<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Medicine;
use Faker\Factory as Faker;

class MedicineSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        foreach (range(1, 30) as $index) {
            Medicine::create([
                'name'      => $faker->sentence(rand(3,6)),                 // Ví dụ: "Thuốc cảm cúm Tiffy Dey & Night"
                'brand'     => $faker->randomElement(['Panadol','Hapacol','Tiffy','Domesco','GSK','Bayer','Stada','OPV','Pyme','Mekophar']),
                'dosage'    => $faker->randomElement(['500mg','1000mg','250mg','100mg','5mg','10mg','20mg','1g','200mg','2mg']),
                'form'      => $faker->randomElement(['Viên nén','Viên nang','Viên sủi','Viên ngậm','Bột pha','Kem bôi','Ống tiêm','Chai truyền']),
                'price'     => $faker->numberBetween(8000, 300000),
                'stock'     => $faker->numberBetween(20, 1500),
            ]);
        }
    }
}