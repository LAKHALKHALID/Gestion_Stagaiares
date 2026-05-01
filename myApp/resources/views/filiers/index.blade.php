@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Liste des filières</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('filiers.create') }}" class="btn btn-primary mb-3">
        Ajouter Filière
    </a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Code</th>
                <th>Niveau</th>
                <th>Français</th>
                <th>Arabe</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($filieres as $filiere)
            <tr>
                <td>{{ $filiere->code_f }}</td>
                <td>{{ $filiere->niveau }}</td>
                <td>{{ $filiere->nom_filiere_francais }}</td>
                <td>{{ $filiere->nom_filiere_arabe }}</td>

                <td>
                    <a href="{{ route('filiers.show', $filiere->code_f) }}" class="btn btn-info btn-sm">Show</a>

                    <a href="{{ route('filiers.edit', $filiere->code_f) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('filiers.destroy', $filiere->code_f) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection