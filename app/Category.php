<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category extends Model {
    protected $guarded = [];
    protected $casts = ['active' => 'boolean'];
    public function products() { return $this->hasMany(Product::class); }
}
