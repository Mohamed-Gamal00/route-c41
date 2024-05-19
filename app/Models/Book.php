<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "name","desc","image","small_desc","user_id","category_id","price"
    ];

    // relation between categories and user

    // category
    // book belong to category

    public function category() {
        return $this->belongsTo(Category::class);
    }

    // user
    // user belong to category
    public function user() {
        return $this->belongsTo(User::class);
    }
}
