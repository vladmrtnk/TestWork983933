<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'site',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
