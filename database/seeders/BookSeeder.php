<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create(['title' => 'Think and Grow Rich', 'author' => 'Napoleon Hill', 'category' => 'Motivation', 'year' => 1937]);
        Book::create(['title' => 'The 7 Habits of Highly Effective People', 'author' => 'Stephen R. Covey', 'category' => 'Self-Help', 'year' => 1989]);
        Book::create(['title' => 'Atomic Habits', 'author' => 'James Clear', 'category' => 'Self-Help', 'year' => 2018]);
        Book::create(['title' => 'How to Win Friends and Influence People', 'author' => 'Dale Carnegie', 'category' => 'Motivation', 'year' => 1936]);
        Book::create(['title' => 'Mindset: The New Psychology of Success', 'author' => 'Carol S. Dweck', 'category' => 'Psychology', 'year' => 2006]);
        Book::create(['title' => 'The Power of Now', 'author' => 'Eckhart Tolle', 'category' => 'Psychology', 'year' => 1997]);
    }
}
