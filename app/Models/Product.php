<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'url',
        'category', 'price', 'alt'
    ];

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_product');
    }
}