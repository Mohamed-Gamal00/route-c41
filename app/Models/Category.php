<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /*
    create columns
    protected -> عشان هورث منه كتير
    */
    protected $table = "categories";
    protected $fillable = [
        "name","desc","image"
    ];
}
