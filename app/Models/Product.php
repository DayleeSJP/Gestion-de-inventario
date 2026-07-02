<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'cost_price',
        'selling_price',
        'stock',
        'min_stock',
        'status',
        'image_path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
}
