<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Ville;
use App\Models\Photos;
use Mockery\Exception;
use App\Models\TypeImmob;
use App\Models\Immobilier;
use App\Models\ImmobPhoto;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        //$immobiliers = Immobilier::all();
        //$immobiliers = Immobilier::orderBy('id', 'desc')->get();
        $immobiliers = Immobilier::where('status', 'Active')->get();
        $types = TypeImmob::all();
        $villes = Ville::all();
        $etats = Immobilier::all();
        $commentaires = Commentaire::all();


        // $types = UsersTypes::get();
        // return view('dashboard.user.home',['types'=>$types])->withTitle('Register');
        //Alert::success('Congrats', 'Immobilier a été bien posté !');

        return view('dashboard.user.home', compact('immobiliers', 'types', 'villes', 'etats', 'commentaires'))->with(['success' => 'Immobilier a été bien posté !']);
    }

    public function Comments(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:immobiliers,id', // Validate that 'id' exists in the "immobiliers" table
            'commentaire' => 'required',
        ]);

        $commentaire = new Commentaire();

        $commentaire->user_id = Auth::user()->id;


        $commentaire->immob_id = $request->id;

        $commentaire->commentaire = $request->commentaire;
        dd('ddddd');
        $commentaire->save();

        return redirect()->route('user.home')->with('success', 'Commentaire a été bien ajouté !');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        // dd($request);
        //$immobiliers = Immobilier::where('user_id', Auth::user()->id)->where('status', 'Pending')->get();     
        try {


            $immobilier = new Immobilier();
            $immobilier->name = $request->name;
            $immobilier->user_id = Auth::user()->id;
            $immobilier->immob_type = $request->immob_type;
            $immobilier->description = $request->description;
            $immobilier->etat = $request->etat;
            $immobilier->surface = $request->surface;
            $immobilier->prix = $request->prix;
            $immobilier->status = 'Pending';
            $immobilier->ville_id = $request->ville_id;
            $immobilier->save();


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
    public function filtrerVille($ville_id)
    {
        $immobiliers = Immobilier::where('ville_id', $ville_id)->where('status', 'Active')->get();
        $types = TypeImmob::all();
        $villes = Ville::all();
        $etats = Immobilier::all();
        $commentaires = Commentaire::all();

        return view('dashboard.user.home', compact('immobiliers', 'types', 'villes', 'etats', 'commentaires'));
    }
    public function filtrerEtat($etat)
    {
        $immobiliers = Immobilier::where('etat', $etat)->where('status', 'Active')->get();
        $types = TypeImmob::all();
        $villes = Ville::all();
        $etats = Immobilier::all();
        $commentaires = Commentaire::all();

        return view('dashboard.user.home', compact('immobiliers', 'types', 'villes', 'etats', 'commentaires'));
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
        return view('dashboard.immobilier.showImmob', compact('immobilier'));
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
        $status = Immobilier::all();
        $immobilier = Immobilier::findOrFail($id);
        return view('dashboard.immobilier.editimmobback', compact('immobilier', 'status', 'types', 'villes', 'etat'));
        //return redirect()->route('showImmobiliers')->with('success', 'Immobillier a été bien modifié !');
    }

    public function updateImmobBack(Request $request, $id)
    {
        $immobilier = Immobilier::findOrFail($id);
        $immobilier->update($request->all());
        return redirect()->route('showImmobiliers', $immobilier)->with('success', 'Immobillier a été bien modifié !');
    }


    public function destroyImmob($id)
    {
        $immobilier = Immobilier::findOrFail($id);
        $immobilier->delete();
        return redirect()->route('showImmobiliers')->with('success', 'Immobillier a été bien supprimé !');
    }


    public function editImmobFront($id)
    {
        $types = TypeImmob::all();
        $villes = Ville::all();
        $etat = Immobilier::all();
        $immobilier = Immobilier::findOrFail($id);
        return view('front.immobilier.editimmob', compact('immobilier', 'types', 'villes', 'etat'));
        // return redirect()->route('user.home', $immobilier)->with('success', 'Immobillier a été bien modifié !');
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
        $immobilier = Immobilier::findOrFail($id);
        $immobilier->update($request->all());
        return redirect()->route('user.home', $immobilier)->with('success', 'Immobillier a été bien modifié !');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroyImmobFront($id)
    {
        $immobilier = Immobilier::findOrFail($id);

        $immobilier->delete();
        return redirect()->route('user.home')->with('success', 'Immobillier a été bien supprimé !');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showImmobFront($id)
    {
        $immobilier = Immobilier::findOrFail($id);

        return view('front.immobilier.detailimmob', compact('immobilier'));

        //return redirect()->route('user.')->with('success', 'Immobillier a été bien supprimé !');


        // return view('dashboard.user.home',['types'=>$types])->withTitle('Register');
    }
}
