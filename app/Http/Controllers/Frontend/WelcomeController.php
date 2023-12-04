<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Category $category)
    {

        $special = Category::where('name', 'special')->first();


        return view('welcome', ['special' => $special]);
    }
}
