@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Modifier Filière</h2>

    <form action="{{ route('filiers.update', $filiere->code_f) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Code -->
        <div class="mb-3">
            <input type="text" name="code_f"
                   value="{{ old('code_f', $filiere->code_f) }}"
                   class="form-control @error('code_f') is-invalid @enderror"
                   placeholder="Code">

            @error('code_f')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Niveau -->
        <div class="mb-3">
            <select name="niveau"
                    class="form-control @error('niveau') is-invalid @enderror">
                <option value="">Choisir niveau</option>

                <option value="Technicien"
                    {{ old('niveau', $filiere->niveau) == 'Technicien' ? 'selected' : '' }}>
                    Technicien
                </option>

                <option value="Technicien Spécialisé"
                    {{ old('niveau', $filiere->niveau) == 'Technicien Spécialisé' ? 'selected' : '' }}>
                    Technicien Spécialisé
                </option>
            </select>

            @error('niveau')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nom FR -->
        <div class="mb-3">
            <input type="text" name="nom_filiere_francais"
                   value="{{ old('nom_filiere_francais', $filiere->nom_filiere_francais) }}"
                   class="form-control @error('nom_filiere_francais') is-invalid @enderror"
                   placeholder="Nom FR">

            @error('nom_filiere_francais')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nom AR -->
        <div class="mb-3">
            <input type="text" name="nom_filiere_arabe"
                   value="{{ old('nom_filiere_arabe', $filiere->nom_filiere_arabe) }}"
                   class="form-control @error('nom_filiere_arabe') is-invalid @enderror"
                   placeholder="Nom AR">

            @error('nom_filiere_arabe')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <textarea name="desc"
                      class="form-control @error('desc') is-invalid @enderror"
                      placeholder="Description">{{ old('desc', $filiere->desc) }}</textarea>

            @error('desc')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Secteur -->
        <div class="mb-3">
            <input type="text" name="secteur"
                   value="{{ old('secteur', $filiere->secteur) }}"
                   class="form-control @error('secteur') is-invalid @enderror"
                   placeholder="Secteur">

            @error('secteur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Buttons -->
        <button class="btn btn-primary">Update</button>

        <a href="{{ route('filiers.index') }}" class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>
@endsection