<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\reservationStoreReq;
use App\Http\Requests\ReservationUpStore;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::latest()->paginate(5);;
        return view('admin.reservation.index', ['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tablez = Table::all();
        return view('admin.reservation.create', ['tables' => $tablez]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(reservationStoreReq $request)
    {
        Reservation::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'tel_number' => $request->tel_number,
            'res_date' => $request->res_date,
            'guest_number' => $request->guest_number,
            'table_id' => $request->table_id

        ]);
        return redirect()->route('reservation.index')->with('success', 'Reservation Inserted');
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
    public function edit(Reservation $reservation)
    {

        //  dd($reservation);
        $tablez = Table::all();
        return view('admin.reservation.edit', ['reservations' => $reservation, 'tables' => $tablez]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationUpStore $request, Reservation $reservation)
    {
        $reservation->update($request->validated());

        return redirect()->route('reservation.index')->with('success', 'Reservation Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
