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



    /**
     * Store a newly created resource in storage.
     */


    // public function store(Request $req)
    // {
    //     $absences = $req->absences ?? [];
    //     $groupe = Groupe::where('nom_g', $req->group_name)->first();

    //     $groupe->stagiaires->each(function ($stagiaire) use ($absences) {

    //         if (!array_key_exists($stagiaire->cef, $absences)) {
    //             Absence::where('stagiaire_id', $stagiaire->cef)
    //                 ->where('startWeek', '!=', null)->delete();
    //         }

    //     });

    //     foreach ($absences as $stagiaireId => $absenceDates) {
    //         foreach ($absenceDates as $date => $seances) {
    //             $absence =  Absence::updateOrCreate(
    //                 [
    //                     'stagiaire_id' => $stagiaireId,
    //                     'date' => \Carbon\Carbon::parse($date)->format('Y-m-d'),
    //                 ],
    //                 [
    //                     'status' => 'Absence',
    //                     'seance' => implode(' ;', $seances),
    //                     'startWeek' => \Carbon\Carbon::parse($req->start_date)->format('Y-m-d'),
    //                 ]
    //             );


    //         }
    //     }
    //     $groupe_name = $req?->group_name ?? "";
    //     $date = $req?->start_date ?? "";
    //     return redirect()->route('listAbsences.index', ["groupe" => $groupe_name, "date" => $date])->with('success', 'Absences mises à jour avec succès !');
    // }

    

    public function store(Request $req)
    {
        $absences = $req->absences ?? [];
        $groupe = Groupe::where('nom_g', $req->group_name)->first();

        $dateWeek = Carbon::parse($req->start_date)->format('Y-m-d');

        /*
    |--------------------------------------------------------------------------
    | 1️⃣ DELETE absences not submitted anymore
    |--------------------------------------------------------------------------
    */
        $groupe->stagiaires->each(function ($stagiaire) use ($absences) {

            if (!array_key_exists($stagiaire->cef, $absences)) {

                $oldAbsences = Absence::where('stagiaire_id', $stagiaire->cef)->get();

                foreach ($oldAbsences as $old) {

                    // 🔁 reverse transaction
                    $seanceCount = $old->seance ? count(explode(' ;', $old->seance)) : 0;

                    Transaction::create([
                        'stagiaire_id' => $stagiaire->cef,
                        'motif' => 'a', // reverse
                        'note' => - ($seanceCount * 0.5),
                    ]);

                    $old->delete();
                }
            }
        });

        /*
    |--------------------------------------------------------------------------
    | 2️⃣ CREATE / UPDATE absences
    |--------------------------------------------------------------------------
    */
        foreach ($absences as $stagiaireId => $absenceDates) {

            foreach ($absenceDates as $date => $seances) {

                $dateFormatted = Carbon::parse($date)->format('Y-m-d');

                $existing = Absence::where('stagiaire_id', $stagiaireId)
                    ->where('date', $dateFormatted)
                    ->first();

                $note = count($seances) * 0.5;

                $data = [
                    'status' => 'Absence',
                    'seance' => implode(' ;', $seances),
                    'startWeek' => $dateWeek,
                ];

                if ($existing) {

                    /*
                |-------------------------
                | 🔁 UPDATE
                |-------------------------
                */

                    // reverse old transaction first
                    $oldCount = $existing->seance ? count(explode(' ;', $existing->seance)) : 0;

                    Transaction::create([
                        'stagiaire_id' => $stagiaireId,
                        'motif' => 'a',
                        'note' => - ($oldCount * 0.5),
                    ]);

                    // update absence
                    $existing->update($data);

                    // add new transaction
                    Transaction::create([
                        'stagiaire_id' => $stagiaireId,
                        'motif' => 'a',
                        'note' => $note,
                    ]);
                } else {

                    /*
                |-------------------------
                | ➕ CREATE
                |-------------------------
                */

                    Absence::create(array_merge([
                        'stagiaire_id' => $stagiaireId,
                        'date' => $dateFormatted,
                    ], $data));

                    Transaction::create([
                        'stagiaire_id' => $stagiaireId,
                        'motif' => 'a',
                        'note' => $note,
                    ]);
                }
            }
        }

        return redirect()->route('listAbsences.index', [
            "groupe" => $req->group_name ?? "",
            "date" => $req->start_date ?? ""
        ])->with('success', 'Absences mises à jour avec succès !');
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
