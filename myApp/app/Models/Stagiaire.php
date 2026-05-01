<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stagiaire extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cef',
        'cin',
        'nom_francais',
        'prenom_francais',
        'nom_arabe',
        'prenom_arabe',
        'nom_annee_scolaire',
        'date_naissance',
        'lieu_naissance',
        'mode_formation',
        'niveau_formation',
        'type_formation',
        'annee_etude',
        'date_demarrage_formation',
        'tel',
        'note',
    ];

    protected $primaryKey = 'cef';
    public $incrementing = false;
    protected $keyType = 'string';

    public function filieres():BelongsToMany{
        return $this->belongsToMany(Filiere::class,'filiere_stagiaire','stagiaire_id','filiere_id','cef','code_f');
    }
}
