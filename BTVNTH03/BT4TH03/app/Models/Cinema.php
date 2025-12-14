<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'total_seats'];

    // Quan hệ: 1 Rạp có nhiều Phim
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}