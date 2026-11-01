<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'category', 'year'];

    protected function casts(): array
    {
        return [
            'is_available' => 'boolean',
            'year' => 'integer',
        ];
    }
}