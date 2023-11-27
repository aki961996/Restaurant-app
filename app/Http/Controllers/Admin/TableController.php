<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableReq;
use App\Http\Requests\TableStore;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tables = Table::latest()->paginate(5);;
        return view('admin.table.index', ['tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.table.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableReq $request)
    {
        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location

        ]);

        return redirect()->route('tables.index')->with('success', 'Table Inserted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        // $tables = Table::all();
        return view('admin.table.edit', ['tables' => $table]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableStore $request, Table $table)
    {



        // $table->update()
        // $request->validate([
        //     'name' => 'required',
        //     'guest_number' => 'required',
        //     'status' => 'required',
        //     'location' => 'required',
        // ]);



        // $table->update([

        //     'name' => $request->name,
        //     'guest_number' => $request->guest_number,
        //     'status' => $request->status,
        //     'location' => $request->location,

        // ]);

        $table->update($request->validated());

        return redirect()->route('tables.index')->with('success', 'Table Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {

        $table->delete();
        return redirect()->route('tables.index')->with('success', 'Table Deleted');
    }
}
