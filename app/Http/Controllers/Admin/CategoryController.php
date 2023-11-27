<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreReq;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::latest()->paginate(7);

        return view('admin.category.index', ['categorys' => $categorys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreReq $request)
    {


        // $cat = new Category();
        if ($request->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'piiia' . time() . '.' . $extension;

            request('image')->storeAs('categories', $fileName);

            // $cat->image = $fileName;
        }
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $fileName



        ]);

        return redirect()->route('categories.index')->with('success', 'Category Inserted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        // dd($category);
        //this is another way
        // $id = decrypt($id);
        // $dataOfCategories = Category::find($id);
        // dd($dataOfCategories->name);
        // $category = Category::all();

        return view('admin.category.edit', ['categories' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        //$image = $category->image;

        if ($request->hasFile('image')) {
            Storage::delete($category->image);
            $extension = request('image')->extension();
            $fileName = 'updnewimg' . time() . '.' . $extension;
            request('image')->storeAs("categories", $fileName);
            $category->image = $fileName;
        }
        $category->update([

            'name' => $request->name,
            'description' => $request->description,

        ]);

        return redirect()->route('categories.index')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category Deleted');
    }
}
