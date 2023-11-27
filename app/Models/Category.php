<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'image',
        'description'

    ];

    //categorty with menu relatin
    public function menus()
    {
        return $this->belongsToMany(Menu::class, "category_menu");
    }
}
