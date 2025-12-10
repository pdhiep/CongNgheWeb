<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ClassModel;
use Faker\Factory as Faker;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $grades = ['Pre-K','Kindergarten','1','2','3','4','5','6','7','8','9','10','11','12'];

        foreach ($grades as $grade) {
            for ($i = 1; $i <= 3; $i++) { // mỗi khối 3 lớp
                ClassModel::create([
                    'grade_level' => $grade,
                    'room_number' => $faker->randomElement(['VH', 'TH', 'AH']) . $faker->numberBetween(1, 15),
                ]);
            }
        }
    }
}