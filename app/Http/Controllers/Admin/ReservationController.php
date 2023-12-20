<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\reservationStoreReq;
use App\Http\Requests\ReservationUpStore;
use App\Mail\ReservationAdd;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::latest()->paginate(5);
        return view('admin.reservation.index', ['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tablez = Table::where('status', TableStatus::Avalaible)->get();
        return view('admin.reservation.create', ['tables' => $tablez]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(reservationStoreReq $request)
    {
        $table = Table::findOrFail($request->table_id);
        // $res = Reservation::all();


        //gusest relate validatin msg
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.');
        }

        //phone number vlaidation
        $telNumber = $request->tel_number;

        if (!is_numeric($telNumber) || strlen($telNumber) !== 10) {
            return back()->with('warning', 'Phone Number must be exactly 10 digits');
        }


        // date validation
        $request_date = Carbon::parse($request->res_date);
        // dd($request_date);
        foreach ($table->reservations as $res) {
            $reservation_date = Carbon::parse($res->res_date);
            if ($reservation_date->format('Y-m-d') == $request_date->format('Y-m-d')) {

                return back()->with('warning', 'This Table Is reserved for this date');
            }
        }


        // $request_date = Carbon::parse($request->res_date);
        // // dd($request_date);


        // foreach ($res as $r) {

        //     $reservation_date = Carbon::parse($r->res_date);
        //     if ($reservation_date->format('Y-m-d') == $request_date->format('Y-m-d')) {

        //         return back()->with('warning', 'This Table Is reserved for this date');
        //     }
        // }


        // foreach ($table->reservations as $res) {
        //     $reservation_date = Carbon::parse($res->res_date);
        //     if ($reservation_date->format('Y-m-d') == $request_date->format('Y-m-d')) {

        //         return back()->with('warning', 'This Table Is reserved for this date');
        //     }
        // }


        $res = Reservation::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'tel_number' => $request->tel_number,
            'res_date' => $request->res_date,
            'guest_number' => $request->guest_number,
            'table_id' => $request->table_id

        ]);

        Mail::to($res->email)->send(new ReservationAdd($res));

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
        $tablez = Table::where('status', TableStatus::Avalaible)->get();
        return view('admin.reservation.edit', ['reservations' => $reservation, 'tables' => $tablez]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationUpStore $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);


        $telNumber = $request->tel_number;
        if (!is_numeric($telNumber) || strlen($telNumber) !== 10) {
            return back()->with('warning', 'Phone Number must be exactly 10 digits');
        }


        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.');
        }

        $request_date = Carbon::parse($request->res_date);
        // dd($request_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();


        foreach ($reservations as $res) {
            // $reservation_date = Carbon::parse($res->res_date);
            if ($res->format('Y-m-d') == $request_date->format('Y-m-d')) {

                return back()->with('warning', 'This Table Is reserved for this date');
            }
        }


        $reservation->update($request->validated());

        return redirect()->route('reservation.index')->with('success', 'Reservation Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservation.index')->with('success', 'Reservation Deleted');
    }
}
