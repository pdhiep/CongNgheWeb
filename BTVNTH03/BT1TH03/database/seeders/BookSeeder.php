<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Library;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        // Lấy danh sách ID các thư viện
        $libraryIds = Library::pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            Book::create([
                'title' => $faker->sentence(4),
                'author' => $faker->name(),
                'publication_year' => $faker->numberBetween(1990, 2024),
                'genre' => $faker->randomElement(['CNTT', 'Kinh tế', 'Văn học', 'Khoa học']),
                'library_id' => $faker->randomElement($libraryIds),
            ]);
        }
    }
}