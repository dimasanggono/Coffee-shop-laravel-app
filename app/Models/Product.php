<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_product', 'id_categories', 'price', 'description', 'image'
    ];

    protected $hidden = [];

    public function Category()
    {
        return $this->belongsTo(Categories::class, 'id_categories', 'id');
    }
}
