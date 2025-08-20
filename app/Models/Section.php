<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['page_id', 'type', 'order', 'content'];

    protected $casts = [
        'content' => 'array', // converte JSON automaticamente
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
