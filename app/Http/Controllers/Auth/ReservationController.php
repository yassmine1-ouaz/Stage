<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Ville;
use App\Models\TypeImmob;
use App\Models\Immobilier;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $immobiliers = Immobilier::orderBy('id', 'desc')->get();
        $reservations = Reservation::all();
        $users = User::all();

        return view('dashboard.reservation.index', compact('reservations', 'immobiliers', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //dd($request);
        $immobiliers = Immobilier::orderBy('id', 'desc')->get();
        $reservations = Reservation::all();
        $users = User::all();

        return view('dashboard.reservation.createreservation', compact('reservations', 'immobiliers', 'users'));
        //return view('front.reservation.createreservation', compact('reservations', 'immobiliers', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = substr($request->reserv_date, 0, 10);
        $time = substr($request->reserv_date, 11);

        //$immobiliers = Immobilier::where('user_id', Auth::user()->id)->where('status', 'Pending')->get();     
        //  $immobilier = Immobilier::findOrFail($request->id);
        $reservation = new Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->immob_id = $request->id;
        $reservation->reserv_date = $date;
        $reservation->datetime  = $time;
        $reservation->message = $request->message;
        $reservation->save();

        return redirect()->route('user.home')->with('success', 'Reservation a été bien ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
