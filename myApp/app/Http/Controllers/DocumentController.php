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
use PhpOption\Option;

class DocumentController extends Controller
{
    
    public function index(Request $req)
    {
        
        return view('documents.index');
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

    public function search(Request $request){

        $cef_groupe = $request->cef_groupe;
        $option = $request->option;


        if($cef_groupe && $option =='engagement'){
            $stagiaire = Stagiaire::find($cef_groupe);
            return $stagiaire ? view('documents.engagement', compact('stagiaire')) 
            : back()->with('error', 'cef or groupe not correct!'); 

        }
        elseif($cef_groupe && $option == 'demande'){
            $stagiaire = Stagiaire::find($cef_groupe);
            return $stagiaire ? view('documents.demande', compact('stagiaire'))
                : back()->with('error', 'cef or groupe not correct!');
        } 
        elseif ($cef_groupe && $option == 'controle_continu') {
            $groupe = Groupe::where('nom_g', $cef_groupe)->first();
            if ($groupe) {
                return view('documents.controle_continue', compact('groupe'));
            }

            return back()->with('error', 'cef or groupe not correct!');
        } 
        elseif ($cef_groupe && $option == 'fin_module') {
            $groupe = Groupe::where('nom_g', $cef_groupe)->first();
            if ($groupe) {

                return view('documents.fin_module', compact('groupe'));
            }
            
        } 
        elseif ($cef_groupe && $option == 'regional') {
            $groupe = Groupe::where('nom_g', $cef_groupe)->first();
            if ($groupe) {

                return view('documents.regional', compact('groupe'));
            }
        }
        else{
            return  back()->with('error', 'you should select one option');
        }
    }
}
