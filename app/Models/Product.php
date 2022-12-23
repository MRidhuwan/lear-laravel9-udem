<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['*'];

     protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'color_id'
    ];

    // has one category

    public function category()
    {
        # code...
        return $this->belongsTo(Category::class,'category_id');
    }

    // has one 0r many colors
    public function colors()
    {
        # code...
        return $this->belongsToMany(Color::class,'colors', 'id');
    }
}
