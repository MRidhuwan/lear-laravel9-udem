<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $guarded = [];

    public function products()
    {
        # code...
        return $this->belongsToMany(Product::class, 'products', 'color_id');

    }


}
