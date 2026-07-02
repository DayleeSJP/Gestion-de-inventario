<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Product extends Model {
    protected $guarded = [];
    protected $casts = ['active' => 'boolean', 'price' => 'decimal:2'];
    public function category() { return $this->belongsTo(Category::class); }
}
