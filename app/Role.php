<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Role extends Model {
    protected $guarded = [];
    protected $casts = ['permissions' => 'array', 'active' => 'boolean'];
    public function users() { return $this->hasMany(User::class); }
}
