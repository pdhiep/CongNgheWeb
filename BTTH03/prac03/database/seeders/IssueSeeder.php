<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Issue;
use App\Models\Computer;
use Faker\Factory as Faker;

class IssueSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $computerIds = Computer::pluck('id')->toArray();

        foreach (range(1, 80) as $index) {
            Issue::create([
                'computer_id'   => $faker->randomElement($computerIds),
                'reported_by'   => $faker->name,
                'reported_date' => $faker->dateTimeBetween('-6 months', 'now'),
                'description'   => $faker->paragraph(rand(2,5)),
                'urgency'       => $faker->randomElement(['Low', 'Medium', 'High']),
                'status'        => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            ]);
        }
    }
}