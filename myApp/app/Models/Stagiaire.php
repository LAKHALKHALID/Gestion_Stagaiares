<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
    protected $keyType = 'int';
}
