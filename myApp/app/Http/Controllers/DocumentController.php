<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Bac;
use App\Models\Comportement;
use App\Models\Deperdition;
use App\Models\Engagement;
use App\Models\Filiere;
use App\Models\Groupe;
use App\Models\Stagiaire;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    
    public function index(Request $req)
    {
        $value = $req->group_or_cef;

        // default queries
        $stagiaires = '';
        $groupes = '';

        if ($value) {

            // 1. Check in stagiaires (CEF)
            $stagiaire = Stagiaire::where('cef', $value)->first();

            if ($stagiaire) {
                $stagiaires = Stagiaire::find( $value);
            }

            // 2. Check in groupes (code_g)
            $groupe = Groupe::where('code_g', $value)->first();

            if ($groupe) {
                $groupes = Groupe::find( $value);
            }
        }
        // return $groupes;
        return view('documents.attestation', compact('stagiaires', 'groupes'));
    }

    public function dashboard(){
        $groupes =Groupe::all();
        $filieres = Filiere::all();
        $stagiaires = Stagiaire::all();
        $absences = Absence::all();
        $engagements = Engagement::all();
        $retraitbac = Bac::where('is_returned',false)->get();
        $deperdition = Deperdition::all();
        $comportement = Comportement::all();
        

        $stagiaires_no_active = Transaction::with('stagiaire')
            ->select('stagiaire_id')
            ->selectRaw('SUM(note) as total_note')
            ->where('motif', 'a')
            ->groupBy('stagiaire_id')
            ->havingRaw('SUM(note) >= 2')
            ->paginate(5);



        $retraitbac = Bac::with('stagiaire')
            ->where('is_returned', 0)
            ->where('type_retrait', 'Retrait Provisoire')
            ->paginate(5);
        return view('dashboard',compact('groupes', 'stagiaires_no_active', 'filieres', 'stagiaires', 'absences', 'engagements', 'retraitbac', 'deperdition', 'comportement'));
    }
}
