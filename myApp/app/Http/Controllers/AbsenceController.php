<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Stagiaire;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {

        $st = Stagiaire::find($req->cef);

        
        if($st && $req->cef){
            
            $absences =$st->absences;
            
        }
        else{
            $absences = Absence::all();
            
        }

        return view('absences.index',compact('absences'));
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
            $transaction->motif='A';
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
    public function update(Request $req, string $id)
    {
            $seance = $req->seance;
            if ($seance == null) {
                return redirect()->route('absences.edit')->with('error', 'It required to select at least one checkbox!');
            }
            $string = implode(' ;', $seance);
            $absence = Absence::find($id);
            $st = $absence->stagiaire;

            if($req->hasFile('chemin')){
                $absence->justification = 'justifiée';
                $format = $req->file('chemin')->extension();
                $name = 'img_'.time().'.'.$format;
                $absence->chemin = $req->file('chemin')->storeAs('images',$name,'public');
                $absence->medecin = $req->medecin;

            $transaction = new Transaction();
            $transaction->stagiaire_id = $st->cef;
            $transaction->note = 0-count($seance) * 0.5;
            $transaction->motif = 'A';
            $transaction->save();
            }
            $absence->seance = $string;
            $absence->status = 'absence';
            $absence->updated_at = now();
            

        $absence->save();
        return redirect()->route('absences.index')->with('success','Update absence avec success !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
