<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Quan trọng: Khai báo các cột được phép điền dữ liệu
    protected $fillable = [
        'title',
        'author',
        'publication_year',
        'genre',
        'library_id' // Cột khóa ngoại nối với bảng libraries
    ];
    
    // (Tùy chọn) Khai báo mối quan hệ để sau này dễ truy vấn
    public function library() {
        return $this->belongsTo(Library::class);
    }
}