<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title', 'page_id', 'position', 'sort_order'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
