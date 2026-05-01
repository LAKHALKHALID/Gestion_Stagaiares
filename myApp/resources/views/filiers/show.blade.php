@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Détails Filière</h2>
    <a href="{{ route('filiers.index') }}" class="btn btn-success btn-sm">
        ← Retour
    </a>
    <div class="card p-3">

        <p><strong>Code:</strong> {{ $filiere->code_f }}</p>
        <p><strong>Niveau:</strong> {{ $filiere->niveau }}</p>
        <p><strong>Français:</strong> {{ $filiere->nom_filiere_francais }}</p>
        <p><strong>Arabe:</strong> {{ $filiere->nom_filiere_arabe }}</p>
        <p><strong>Description:</strong> {{ $filiere->desc }}</p>
        <p><strong>Secteur:</strong> {{ $filiere->secteur }}</p>

    </div>

</div>
@endsection