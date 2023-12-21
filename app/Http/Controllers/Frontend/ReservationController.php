<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\reservationStoreReq;
use App\Models\Reservation;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        // dd($request);
        $reservations = $request->session()->get('reservation');
        //dd($reservations);
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        // return view('reservation.step-one', ['reservations' => $reservation, ['min_date' => $min_date], ['max_date' => $max_date]]);
        return view('reservation.step-one', compact('reservations', 'min_date', 'max_date'));
    }

    public function storeStepOne(Request $request)
    {
        // dd($request);
        $validated  = $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',

            'guest_number' => 'required',
            'tel_number' => 'required',
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],

        ]);

        if (empty($request->session()->get('reservation'))) {

            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }

        // $table = Table::findOrFail($request->table_id);
        // //dd($table);

        // if ($request->guest_number > $table->guest_number) {
        //     return back()->with('warning', 'Please choose the table base on guests.');
        // }


        // $request_date = Carbon::parse($request->res_date);

        // foreach ($table->reservations as $res) {
        //     $reservation_date = Carbon::parse($res->res_date);
        //     if ($reservation_date->format('Y-m-d') == $request_date->format('Y-m-d')) {

        //         return back()->with('warning', 'This Table Is reserved for this date');
        //     }
        // }



        // $res = new Reservation();
        // $res->name = $request->name;
        // $res->last_name = $request->last_name;
        // $res->email = $request->email;
        // // $res->table_id = $request->table_id;
        // $res->guest_number = $request->guest_number;
        // $res->tel_number = $request->tel_number;
        // $res->res_date = $request->res_date;

        // $res->save();

        return redirect()->route('reservations.step.two')->with('success', 'Reservation Inserted');
    }


    public function stepTwo(Request $request)
    {

        $reservations = $request->session()->get('reservation');



        $res_table_ids = Reservation::orderBy('res_date')
            ->get()
            ->filter(function ($value) use ($reservations) {
                $reservationsDate = $reservations->res_date;


                if (is_string($reservationsDate)) {

                    $reservationsDate = Carbon::parse($reservationsDate);
                    // dd($reservationsDate);
                }

                // return $value->res_date->format('Y-m-d') == $reservations->res_date->format('Y-m-d');
                return Carbon::parse($value->res_date)->format('Y-m-d') == $reservationsDate->format('Y-m-d');
            })->pluck('table_id');

        //dd($res_table_ids);

        $tablez = Table::where('status', TableStatus::Avalaible)
            ->where('guest_number', '>=',  $reservations->guest_number)
            ->whereNotIn('id', $res_table_ids)->get();

        //  dd($tablez);


        return view('reservation.step-two', compact('tablez', 'reservations'));
    }

    public function storeStepTwo(Request $request)
    {

        $validatedData = $request->validate([
            'table_id' => ['required']

        ]);

        $reservation = $request->session()->get('reservation');
        //  $reservation = new Reservation();
        $reservation->fill($validatedData);
        $reservation->save();


        $request->session()->forget('reservation');

        return redirect()->route('thankyou')->with('success', 'Reservation Inserted');
        // return redirect()->route('reservations.step.two')->with('success', 'Reserved');


    }
}
