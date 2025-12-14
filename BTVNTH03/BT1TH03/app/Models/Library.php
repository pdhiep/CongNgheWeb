<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    // Cho phép điền dữ liệu vào các cột này
    protected $fillable = ['name', 'address', 'contact_number'];
}