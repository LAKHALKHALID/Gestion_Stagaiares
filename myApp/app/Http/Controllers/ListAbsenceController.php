<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Groupe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ListAbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $groupe = Groupe::where('nom_g', $req->groupe)->get();
        $startOfWeek =  Carbon::parse($req->date)->startOfWeek();

        // dd($startOfWeek);
        $st = '';
        if ($req->groupe) $st = $groupe[0]->stagiaires;

        return view('listAbsences.index', compact('st', 'startOfWeek'));
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
        
        $data = $req->absences;
        foreach ($data as $stagiaireId => $dates) {
            foreach ($dates as $date => $seance) {
                $string = implode(" ;", $seance);
                // dd($string, \Carbon\Carbon::parse($req->start_date));
                $res = Absence::create([
                    'stagiaire_id' => $stagiaireId,
                    'status' => 'Absence',
                    'seance' => $string,
                    'startWeek'=> \Carbon\Carbon::parse($req->start_date),
                    'date' => \Carbon\Carbon::parse($date),
                ]);
                info($res);
            }
        }
        return redirect()->route('listAbsences.index')->with('success','Ajouter les absences avec succée !');
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
