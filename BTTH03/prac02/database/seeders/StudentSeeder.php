<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\ClassModel;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $classIds = ClassModel::pluck('id')->toArray();

        foreach (range(1, 150) as $index) {
            $birth = $faker->dateTimeBetween('-15 years', '-4 years')->format('Y-m-d');
            Student::create([
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'date_of_birth' => $birth,
                'parent_phone'  => '09' . $faker->numberBetween(10000000, 99999999),
                'class_id'      => $faker->optional(0.9)->randomElement($classIds),
            ]);
        }
    }
}