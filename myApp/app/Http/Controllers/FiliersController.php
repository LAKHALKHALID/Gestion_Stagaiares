<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

use function PHPUnit\Framework\countOf;

class FiliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Filiere::query();
        if($request->niveau){
           $query->where('niveau',$request->niveau);
        }
        $nb = $query->count();
        $filieres = $query->get();
        return view('filiers.index',compact('filieres','nb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filiers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
        'code_f' => 'required|string|unique:filieres,code_f',
        'niveau' => 'required',
        'nom_filiere_francais' => ['required', 'regex:/^[\p{L}\s\-\']+$/u'],
        'nom_filiere_arabe' => 'required|regex:/^[\p{Arabic}\s]+$/u',
          ], [
        'code_f.unique' => 'Le code de la filière est déja exists.',
        'code_f.required' => 'Le code de la filière est obligatoire.',
        'code_f.string' => 'Le code de la filière doit être une chaîne de caractères.',
        'niveau.required' => 'Le niveau est obligatoire.',
        'nom_filiere_francais.required' => 'Le nom de la filière en français est obligatoire.',
        'nom_filiere_francais.regex' => 'Le nom en français doit contenir uniquement des lettres.',
        'nom_filiere_arabe.required' => 'اسم الشعبة بالعربية إجباري.',
        'nom_filiere_arabe.regex' => 'اسم الشعبة بالعربية يجب أن يحتوي فقط على حروف عربية.',
          ]);
        Filiere::create($req->only([
            'code_f',
            'niveau',
            'desc',
            'secteur',
            'nom_filiere_francais',
            'nom_filiere_arabe',
        ]));
        return to_route('filiers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $filiere = Filiere::findOrFail($id);
        return view("filiers.show",compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $filiere = Filiere::findOrFail($id);
        return view("filiers.edit",compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Filiere $filiere)
{
    $validated = $req->validate([
        'niveau' => 'required',
        'desc' => 'nullable|string',
        'secteur' => 'nullable|string',
        'nom_filiere_francais' => 'required|regex:/^[\p{L}\s]+$/u',
        'nom_filiere_arabe' => 'required|regex:/^[\p{Arabic}\s]+$/u',
    ], [
        'niveau.required' => 'Le niveau est obligatoire.',
        'nom_filiere_francais.required' => 'Le nom en français est obligatoire.',
        'nom_filiere_francais.regex' => 'Le nom en français doit contenir uniquement des lettres.',
        'nom_filiere_arabe.required' => 'اسم الشعبة بالعربية إجباري.',
        'nom_filiere_arabe.regex' => 'اسم الشعبة بالعربية يجب أن يحتوي فقط على حروف عربية.',
    ]);

    $filiere->update($validated);

    return to_route('filiers.index')
        ->with('success', 'Filière mise à jour avec succès');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = Filiere::findOrFail($id);
        $db->delete();
        return to_route('filiers.index');
    }
}
