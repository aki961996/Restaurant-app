<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'description',
        'price'

    ];

    //menu with category relation ships

    public function categories()
    {
        return $this->belongsToMany(Category::class, "category_menu");
    }
}
