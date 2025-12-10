<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name','last_name','date_of_birth','parent_phone','class_id'];
    public function class() {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}