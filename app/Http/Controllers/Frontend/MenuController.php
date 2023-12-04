<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Menu $menu)
    {
        $menu = Menu::all();
        return view('menus.index', ['menu' => $menu]);
    }
}
