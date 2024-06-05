<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
protected $fillable = ['image', 'is_main'];
public function product()
{
    return $this->belongsTo(Product::class);
}
}
