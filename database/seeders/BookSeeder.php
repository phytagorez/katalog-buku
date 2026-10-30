<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Filosofi Teras',
                'author' => 'Henry Manampiring',
                'tahun_terbit' => 2018,
            ],
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'tahun_terbit' => 2005,
            ],
            [
                'title' => 'Bumi Manusia',
                'author' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1980,
            ],
            [
                'title' => 'Laut Bercerita',
                'author' => 'Leila S. Chudori',
                'tahun_terbit' => 2017,
            ],
            [
                'title' => 'Cantik Itu Luka',
                'author' => 'Eka Kurniawan',
                'tahun_terbit' => 2002,
            ],
            [
                'title' => 'Hujan',
                'author' => 'Tere Liye',
                'tahun_terbit' => 2016,
            ],
            [
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'tahun_terbit' => 2009,
            ],
            [
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'tahun_terbit' => 2019,
            ],
            [
                'title' => 'The Psychology of Money',
                'author' => 'Morgan Housel',
                'tahun_terbit' => 2020,
            ],
        ];

        foreach ($books as $book) {
            Book::firstOrCreate(
                ['title' => $book['title'], 'author' => $book['author']],
                $book
            );
        }
    }
}
