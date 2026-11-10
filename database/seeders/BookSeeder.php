<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $motivation = Category::create(['name' => 'Motivation']);
        $selfHelp   = Category::create(['name' => 'Self-Help']);
        $psychology = Category::create(['name' => 'Psychology']);

        Book::create(['title' => 'Think and Grow Rich', 'author' => 'Napoleon Hill', 'year' => 1937, 'category_id' => $motivation->id]);
        Book::create(['title' => 'The 7 Habits of Highly Effective People', 'author' => 'Stephen R. Covey', 'year' => 1989, 'category_id' => $selfHelp->id]);
        Book::create(['title' => 'Atomic Habits', 'author' => 'James Clear', 'year' => 2018, 'category_id' => $selfHelp->id]);
        Book::create(['title' => 'How to Win Friends and Influence People', 'author' => 'Dale Carnegie', 'year' => 1936, 'category_id' => $motivation->id]);
        Book::create(['title' => 'Mindset: The New Psychology of Success', 'author' => 'Carol S. Dweck', 'year' => 2006, 'category_id' => $psychology->id]);
        Book::create(['title' => 'The Power of Now', 'author' => 'Eckhart Tolle', 'year' => 1997, 'category_id' => $psychology->id]);
    }
}