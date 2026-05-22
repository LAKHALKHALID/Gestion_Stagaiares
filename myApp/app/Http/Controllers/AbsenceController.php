<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Groupe;
use App\Models\Stagiaire;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AbsenceController extends Controller
{
    

    public function index(Request $req)
    {
        $query = Absence::query();

        if ($req->cef) {
            $st = Stagiaire::where('cef', $req->cef)->first();

            if ($st) {
                $query->where('stagiaire_id', $st->id);
            } else {
                return redirect()
                    ->route('absences.index')
                    ->with('error', 'CEF not found!');
            }
        }

        $absences = $query->paginate(10);

        return view('absences.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('absences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {


        $st = Stagiaire::find($req->cef);
        $seance = $req->seance;
        if($seance == null){
            return redirect()->route('absences.create')->with('error', 'It required to select at least one checkbox!');
        }
        $string = implode(' ;',$seance);
        if($st){
            // $transaction = $st->transactions;
            $transaction = new Transaction();
            $transaction->stagiaire_id=$st->cef;
            $transaction->note=count($seance)*0.5;
            $transaction->motif='a';
            $transaction->save();
            Absence::create([
                'stagiaire_id'=>$req->cef,
                'seance'=> $string,
                'status' => 'absence',
                'date'=>now()
            ]);

            return redirect()->route('absences.index')->with('success','Ajouter Absence avec success !');

        }
        else{
            return redirect()->route('absences.create')->with('error', 'Thi Stagiaire does not exist !');
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
        $ab = Absence::find($id);
        $seance = $ab->seance;
        $data = explode(' ;',$seance);
        

        return view('absences.edit',compact('ab','data'));
    }

    /**
     * Update the specified resource in storage.
     */

    // public function update(Request $req, string $id)
    // {
    //         $seance = $req->seance;
    //         if ($seance == null) {
    //             return redirect()->route('absences.edit')->with('error', 'It required to select at least one checkbox!');
    //         }
    //         $string = implode(' ;', $seance);
    //         $absence = Absence::find($id);
    //         $st = $absence->stagiaire;

    //         if($req->hasFile('chemin')){
    //             $absence->justification = 'justifiée';
    //             $format = $req->file('chemin')->extension();
    //             $name = 'img_'.time().'.'.$format;
    //             $absence->chemin = $req->file('chemin')->storeAs('images',$name,'public');
    //             $absence->medecin = $req->medecin;

    //             $transaction = new Transaction();
    //             $transaction->stagiaire_id = $st->cef;
    //             $transaction->note = -count($seance) * 0.5;
    //             $transaction->motif = 'a';
    //             $transaction->save();
    //         }
    //         $absence->seance = $string;
    //         $absence->status = 'absence';
    //         $absence->updated_at = now();


    //     $absence->save();
    //     return redirect()->route('absences.index')->with('success','Update absence avec success !');
    // }

    public function update(Request $req, string $id)
    {
        $absence = Absence::findOrFail($id);

        // old seances count
        $oldCount = $absence->seance
            ? count(explode(' ;', $absence->seance))
            : 0;

        $seance = $req->seance;

        // transaction of this stagiaire
        $transaction = Transaction::where('stagiaire_id', $absence->stagiaire_id)
            ->where('motif', 'a')
            ->latest()
            ->first();

        /*
    |--------------------------------------------------------------------------
    | IF seance is NULL
    |--------------------------------------------------------------------------
    */
        if ($seance == null) {

            // remove absence effect
            if ($transaction) {

                // OPTION 1 : reset to 0
                // $transaction->note = 0;

                // OPTION 2 : reverse old note
                $transaction->note = $transaction->note - ($oldCount * 0.5);

                $transaction->save();
            }

            // clear absence seance
            $absence->seance = null;

            $absence->save();

            return redirect()->route('absences.index')
                ->with('success', 'Absence updated successfully!');
        }

        /*
    |--------------------------------------------------------------------------
    | NORMAL UPDATE
    |--------------------------------------------------------------------------
    */
        $string = implode(' ;', $seance);

        $absence->seance = $string;
        $absence->status = 'absence';
        $absence->updated_at = now();

        if ($req->hasFile('chemin')) {

            $absence->justification = 'justifiée';

            $format = $req->file('chemin')->extension();
            $name = 'img_' . time() . '.' . $format;

            $absence->chemin = $req->file('chemin')
                ->storeAs('images', $name, 'public');

            $absence->medecin = $req->medecin;
            $transaction->note = 0;
            $transaction->save();
        }

        // update transaction
        $newNote = count($seance) * 0.5;

        if ($transaction) {

            $transaction->note = $newNote;
            $transaction->save();
        } else {

            Transaction::create([
                'stagiaire_id' => $absence->stagiaire_id,
                'note' => $newNote,
                'motif' => 'a',
            ]);
        }

        $absence->save();

        return redirect()->route('absences.index')
            ->with('success', 'Update absence avec success !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $absence = Absence::find($id);
        $absence->delete();
        return to_route('absences.index');
    }
}
