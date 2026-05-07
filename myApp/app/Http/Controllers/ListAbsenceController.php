<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Groupe;
use App\Models\Stagiaire;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ListAbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $groupe = Groupe::where('nom_g', $req->groupe)->first();
        $startOfWeek =  Carbon::parse($req->date)->startOfWeek();




        $stagiaires = '';

        if ($req->groupe) $stagiaires = $groupe->stagiaires;

        //return $stagiaires[0]->absences;


        return view('listAbsences.index', compact('stagiaires', 'startOfWeek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // public function modifie(){
    //     $absences = Absence::where('startWeek','!=',null)->get();
    //     // dd($absences);
    //     return view('listAbsences.edit',compact('absences'));
    // }

    // public function newIndex(Request $req){
    //     $groupe = Groupe::where('nom_g', $req->groupe)->get();
    //     $startOfWeek =  Carbon::parse($req->date)->startOfWeek();        
    //     $st = '';
    //     if ($req->groupe) $st = $groupe[0]->stagiaires;

    //     return view('listAbsences.edit', compact('st', 'startOfWeek'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $absences = $req->absences ?? [];
        $groupe = Groupe::where('nom_g', $req->group_name)->first();
    
        $groupe->stagiaires->each(function ($stagiaire) use ($absences) {

            if (!array_key_exists($stagiaire->cef, $absences)) {
                Absence::where('stagiaire_id', $stagiaire->cef)
                    ->where('startWeek', '!=', null)->delete();
            }

        });

        foreach ($absences as $stagiaireId => $absenceDates) {
            foreach ($absenceDates as $date => $seances) {
                $absence =  Absence::updateOrCreate(
                    [
                        'stagiaire_id' => $stagiaireId,
                        'date' => \Carbon\Carbon::parse($date)->format('Y-m-d'),
                    ],
                    [
                        'status' => 'Absence',
                        'seance' => implode(' ;', $seances),
                        'startWeek' => \Carbon\Carbon::parse($req->start_date)->format('Y-m-d'),
                    ]
                );
                // $absence = Absence::where('stagiaire_id', $stagiaireId)
                //     ->where('date', \Carbon\Carbon::parse($date)->format('Y-m-d'))
                //     ->first();

                // $data = [
                //     'status' => 'Absence',
                //     'seance' => implode(' ;', $seances),
                //     'startWeek' => \Carbon\Carbon::parse($req->start_date)->format('Y-m-d'),
                // ];

                // if ($absence) {

                //     // UPDATE
                //     // $oldSeances = explode(';', $absence->seance);
                //     // $transaction = Transaction::where('stagiaire_id', $stagiaireId)
                //     //     ->where('motif', 'A')
                //     //     ->latest()
                //     //     ->first();
                //     // $transaction->update([
                //     //     'note' => $transaction->note - count($oldSeances) * 0.5,
                //     // ]);
                //     $absence->update($data);
                // } else {

                //     // CREATE
                //     $data['stagiaire_id'] = $stagiaireId;
                //     $data['date'] = \Carbon\Carbon::parse($date)->format('Y-m-d');

                //     // Absence::create($data);
                //     // $transaction = new Transaction();
                //     // $transaction->stagiaire_id = $stagiaireId;
                //     // $transaction->note = 0 - count($seances) * 0.5;
                //     // $transaction->motif = 'A';
                //     // $transaction->save();
                // }
                
            }
        }
        $groupe_name = $req?->group_name ?? "";
        $date = $req?->start_date ?? "";
        return redirect()->route('listAbsences.index', ["groupe" => $groupe_name, "date" => $date])->with('success', 'Absences mises à jour avec succès !');
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
