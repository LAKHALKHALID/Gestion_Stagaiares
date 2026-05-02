@extends('layouts.app')

@section('content')

<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h4 class="mb-0">Liste des Groupes</h4>

            <a href="{{ route('groupes.create') }}" class="btn btn-light btn-sm">
                + Ajouter
            </a>
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('groupes.index') }}" class="mb-3">

                <div class="row">

                    <div class="col-md-4">
                        <select name="filiere_id" class="form-control" onchange="this.form.submit()">

                            <option value="">-- Toutes les filières --</option>

                            @foreach($filiers as $f)
                                <option value="{{ $f->code_f }}"
                                    {{ request('filiere_id') == $f->code_f ? 'selected' : '' }}>
                                    {{ $f->nom_filiere_francais }}
                                </option>
                            @endforeach

                        </select>
                        Nb: <span class="badge bg-primary">{{ $nb }}</span>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('groupes.index') }}" class="btn btn-secondary">
                            Reset
                        </a>
                    </div>

                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead class="table-dark">
                        <tr>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>Filière</th>
                            <th>Capacité</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($groupes as $g)
                            <tr>
                                <td>{{ $g->code_g }}</td>
                                <td>{{ $g->nom_g }}</td>
                                <td>{{ $g->filiere->nom_filiere_francais ?? '' }}</td>
                                <td>{{ $g->capacite }}</td>
                                <td>
                                    <a href="{{ route('groupes.show', $g->code_g) }}"
                                       class="btn btn-info btn-sm">
                                        Voir
                                    </a>
                                    <a href="{{ route('groupes.edit', $g->code_g) }}"
                                       class="btn btn-warning btn-sm">
                                        Modifier
                                    </a>
                                    <form action="{{ route('groupes.destroy', $g->code_g) }}"
                                          method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Supprimer ce groupe ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Aucun groupe trouvé
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $groupes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection