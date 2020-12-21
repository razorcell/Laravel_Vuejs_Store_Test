<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }
    public function getUrlAttribute()
    {
        return route("products.show", $this->id);
    }
}
