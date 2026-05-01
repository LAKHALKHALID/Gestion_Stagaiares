<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $table = 'filieres';

    protected $primaryKey = 'code_f';
    public $incrementing = false;   // because PK is string
    protected $keyType = 'string';

    protected $fillable = [
        'code_f',
        'niveau',
        'description',
        'secteur',
        'nom_filiere_francais',
        'nom_filiere_arabe',
    ];
}
