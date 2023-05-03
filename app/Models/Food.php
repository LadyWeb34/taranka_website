<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable = [
        'cateogry_id',
        'name',
        'slug',
        'price',
        'image'
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
