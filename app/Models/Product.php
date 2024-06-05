<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'price', 'description', 'user_id'];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
    public function mainImage() {
        return $this->hasOne(Picture::class)->where('is_main', true);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
