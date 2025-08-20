<?php

// app/Models/Page.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'meta_description', 'hero_image'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'page_product');
    }

    public function sections()
    {
        return $this->hasMany(Section::class)->orderBy('order');
    }

}
