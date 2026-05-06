<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Groupe;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $f = Filiere::all();
        $g = Groupe::all();
        return view('inscription.index',compact('f','g'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $stagiaire = Stagiaire::find($req->cef);
        if($stagiaire){
            $stagiaire->groupes()->attach($req->code_g);
            $stagiaire->filieres()->attach($req->code_f);
            return redirect()->route('inscription.index')->with('success', 'Ajouter Stagiaire avec succée !');
        }
        else{
            Session::flash('refuse','the cef of the Stagiaire incorrect try again !');
            return to_route('inscription.index');
        }
        

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
