<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('categories.index', ['categorys' => $category]);
    }

    public function show(Category $category)
    {
        dd($category->id);
    }
}
