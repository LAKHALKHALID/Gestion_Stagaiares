<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('stagiaires.index',compact('stagiaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stagiaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            'cef'=>'required|min:13|max:13',
            'cin'=>'required|min:7|max:8',
            'nom_francais' => 'required|min:3',
            'prenom_francais' => 'required|min:3',
            'nom_annee_scolaire'=>'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'niveau_formation' => 'required',
            'type_formation' => 'required',
            'annee_etude' => 'required',
            'date_demarrage_formation' => 'required',
            'tel' => 'required|regex:/^0[5-7]\d{8}$/',
        ]);
        Stagiaire::create($req->all());
        return redirect()->route('stagiaires.index')->with('success','Ajouter Stagiaire avec succée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stagiaire = Stagiaire::find($id);
        return view('stagiaires.show',compact('stagiaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stagiaire = Stagiaire::find($id);
        return view('stagiaires.edit',compact('stagiaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $req->validate([
            'nom_francais' => 'required|min:3',
            'prenom_francais' => 'required|min:3',
            'nom_arabe' => 'required|min:3',
            'prenom_arabe' => 'required|min:3',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'type_formation' => 'required',
            'date_demarrage_formation' => 'required',
            'tel' => 'required|regex:/^0[5-7]\d{8}$/',
        ]);

        $stagiaire = Stagiaire::find($id);
        $stagiaire->update($req->all());

        return redirect()->route('stagiaires.index')->with('success','Més a jour le Stagiaire avec succée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stagiaire = Stagiaire::find($id);

        $stagiaire->delete();

        return redirect()->route('stagiaires.index')->with('success','Supprimer le Stagiaire avec succée !');

        
    }
}
