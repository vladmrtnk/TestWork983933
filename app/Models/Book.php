<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'genre',
        'author_id'
    ];

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }
}
