<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Immobilier;
use App\Models\ImmobPhoto;
use App\Models\TypeImmob;
use App\Models\User;
use App\Models\Photos;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Mockery\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class ImmobilierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $immobiliers = Immobilier::all();
        $types = TypeImmob::all();
        $villes = Ville::all();
        $etat = Immobilier::all();
        //$immobiliers = Immobilier::with('images')->get();

        //Alert::success('Congrats', 'Immobilier a été bien posté !');


        return view('dashboard.user.home', compact('immobiliers', 'types', 'villes', 'etat'))->with(['message' => 'Immobilier a été bien posté !']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        try {

            $immobilier = new Immobilier();
            $immobilier->name = $request->name;
            $immobilier->user_id = Auth::user()->id;
            $immobilier->immob_type = $request->immob_type;
            $immobilier->description = $request->description;
            $immobilier->etat = $request->etat;
            $immobilier->surface = $request->surface;
            $immobilier->prix = $request->prix;
            $immobilier->status = 0;
            $immobilier->ville_id = $request->ville_id;
            $immobilier->save();

            //$image = array();

            if ($request->hasFile("image")) {
                $files = $request->file("image");
                $this->mediaFiles($files, 'images\immob_pictures', $immobilier->id);
            }

            return redirect()->route('user.home')->with('success', 'Immobilier a été bien posté !');
        } catch (Exception $exception) {
            dd('matemchich');
            return redirect()->route('user.home');


        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createImmob(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showImmob($id)
    {
        $immobilier = Immobilier::findOrFail($id);
        return view('dashboard.immobilier.showImmob',compact('immobilier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editImmob($id)
    {
        $types = TypeImmob::all();
        $villes = Ville::all();
        $etat = Immobilier::all();
        $immobiliers = Immobilier::findOrFail($id);
        return view('dashboard.immobilier.editImmob', compact('immobiliers', 'types', 'villes', 'etat'))->with(['message' => 'Immobilier a été bien modifié !']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $immobiliers = Immobilier::findOrFail($id);

        $immobiliers->delete();
        return redirect()->route()->with('success' , 'Immobillier a été bien supprié !');
    }

    public function front_immobilier()

    {
        $immobiliers = Immobilier::all();

        return view('dashboard.user.home')->with(['immobiliers' => $immobiliers]);
    }
}
