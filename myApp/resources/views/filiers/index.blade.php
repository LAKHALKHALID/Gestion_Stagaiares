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
            <h4 class="mb-0">Liste des Filières</h4>

            <a href="{{ route('filiers.create') }}" class="btn btn-light btn-sm">
                + Ajouter
            </a>
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('filiers.index') }}" class="mb-3">

                <div class="row">

                    <div class="col-md-4">
                        <select name="niveau" class="form-control" onchange="this.form.submit()">

                            <option value="">-- Tous les niveaux --</option>

                            <option value="Technicien"
                                {{ request('niveau') == 'Technicien' ? 'selected' : '' }}>
                                Technicien
                            </option>

                            <option value="Technicien Spécialisé"
                                {{ request('niveau') == 'Technicien Spécialisé' ? 'selected' : '' }}>
                                Technicien Spécialisé
                            </option>

                        </select>
                        Nb: <span class="badge bg-primary">{{ $nb }}</span>
                    </div>

                    <div class="col-md-4">
                        <select name="mode_f" class="form-control" onchange="this.form.submit()">
                            <option value="">-- Tous les modes --</option>
                            <option value="Qualifiant"
                                {{ request('mode_f') == 'Qualifiant' ? 'selected' : '' }}>
                                Qualifiant
                            </option>
                            <option value="Diploma"
                                {{ request('mode_f') == 'Diploma' ? 'selected' : '' }}>
                                Diploma
                            </option>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('filiers.index') }}" class="btn btn-secondary">
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
                            <th>Niveau</th>
                            <th>Mode</th>
                            <th>Français</th>
                            <th>Arabe</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($filieres as $f)
                            <tr>
                                <td>{{ $f->code_f }}</td>
                                <td>{{ $f->niveau }}</td>
                                <td>{{ $f->mode_f }}</td>
                                <td>{{ $f->nom_filiere_francais }}</td>
                                <td dir="rtl">{{ $f->nom_filiere_arabe }}</td>

                                <td>
                                    <a href="{{ route('filiers.show', $f->code_f) }}"
                                       class="btn btn-info btn-sm">
                                        Voir
                                    </a>

                                    <a href="{{ route('filiers.edit', $f->code_f) }}"
                                       class="btn btn-warning btn-sm">
                                        Modifier
                                    </a>

                                    <form action="{{ route('filiers.destroy', $f->code_f) }}"
                                          method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Supprimer ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Aucune filière trouvée
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection