<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['id', 'name', 'description', 'price', 'category_id'];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
