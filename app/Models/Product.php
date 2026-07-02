<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'cost_price',
        'selling_price',
        'price',
        'stock',
        'min_stock',
        'status',
        'active',
        'image_path',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'cost_price' => 'decimal:2',
            'selling_price' => 'decimal:2',
            'price' => 'decimal:2',
            'stock' => 'decimal:2',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
