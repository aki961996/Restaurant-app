<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStore;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::latest()->paginate(5);
        return view('admin.menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Categories = Category::all();
        return view('admin.menu.create', ['Categories' =>  $Categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStore $request)
    {

        if ($request->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'menu' . time() . '.' . $extension;

            request('image')->storeAs('menu', $fileName);
        }

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $fileName

        ]);


        //dd($request->all());
        //reletion 
        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
        }
        return redirect()->route('menu.index')->with('success', 'Menu Inserted');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        // dd($menu->id);
        $Categories = Category::all();
        return view('admin.menu.edit', ['Categories' => $Categories, 'menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        // $image = $menu->image;
        // dd($image);

        if ($request->hasFile('image')) {

            Storage::delete($menu->image);
            $extension = request('image')->extension();
            $fileName = 'menu' . time() . '.' . $extension;
            request('image')->storeAs("menu", $fileName);
            $menu->image = $fileName;
        }
        $menu->update([

            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price

        ]);

        //reletion 
        if ($request->has('categories')) {
            $menu->categories()->sync($request->categories);
        }

        return redirect()->route('menu.index')->with('success', 'Menu Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu Deleted');
    }
}
