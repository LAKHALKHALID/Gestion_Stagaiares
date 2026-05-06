<?php

namespace App\Http\Controllers;

use App\Models\Comportement;
use App\Models\Stagiaire;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ComportementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comp = Comportement::simplePaginate(10);
        return view('comportements.index',compact('comp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comportements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $ct = new Comportement();
        $ct->sanction = $req->sanction;
        $ct->autorite_dec=$req->autorite_dec;
        $ct->miseEnGarde=$req->miseEnGarde;
        $ct->motife = $req->motif;
        $ct->stagiaire_id = $req->cef;
        $ct->created_at = $req->date;
        $ct->updated_at = null;
        $ct->save();
        // dd($ct->miseEnGarde);
        $st = Stagiaire::find($req->cef);

        $transaction = new Transaction();
        $transaction->stagiaire_id = $st->cef;
        $transaction->motif = 'C';
        
        if($ct->miseEnGarde == '1ère Mise en garde'){
            $transaction->note = 1;
        }
        elseif($ct->miseEnGarde == '2ème Mise en garde'){
            $transaction->note = 2;
        } 
        elseif ($ct->miseEnGarde == '3ème Mise en garde') {
            $transaction->note = 3;
        } 
        elseif ($ct->miseEnGarde == '4ème Mise en garde') {
            $transaction->note = 4;
        }
        else{
            $transaction->note = 5;
        }
        $transaction->save();
        $st->save();
        return to_route('comportement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comportement $comportement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comportement $comportement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comportement $comportement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comportement $comportement)
    {
        //
    }
}
