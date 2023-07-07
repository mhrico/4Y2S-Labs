<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 5; $i++){
            Book::create([
                'name' => Str::random(5),
                'author' => Str::random(5),
                'quantity' => random_int(0, 10),
                'price' => random_int(0, 10)
            ]);
        }
    }
}
