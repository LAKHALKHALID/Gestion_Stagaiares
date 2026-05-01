@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Ajouter Filière</h2>

    <form action="{{ route('filiers.store') }}" method="POST">
        @csrf

        <!-- Code -->
        <div class="mb-3">
            <input type="text" name="code_f"
                   value="{{ old('code_f') }}"
                   class="form-control @error('code_f') is-invalid @enderror"
                   placeholder="Code">

            @error('code_f')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <select name="niveau"
                    class="form-control @error('niveau') is-invalid @enderror">
                <option value="">Choisir niveau</option>
                <option value="Technicien" {{ old('niveau') == 'Technicien' ? 'selected' : '' }}>
                    Technicien
                </option>
                <option value="Technicien Spécialisé" {{ old('niveau') == 'Technicien Spécialisé' ? 'selected' : '' }}>
                    Technicien Spécialisé
                </option>
            </select>

            @error('niveau')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="text" name="nom_filiere_francais"
                   value="{{ old('nom_filiere_francais') }}"
                   class="form-control @error('nom_filiere_francais') is-invalid @enderror"
                   placeholder="Nom FR">

            @error('nom_filiere_francais')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="text" name="nom_filiere_arabe"
                   value="{{ old('nom_filiere_arabe') }}"
                   class="form-control @error('nom_filiere_arabe') is-invalid @enderror"
                   placeholder="Nom AR">

            @error('nom_filiere_arabe')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <textarea name="desc"
                      class="form-control @error('desc') is-invalid @enderror"
                      placeholder="Description">{{ old('desc') }}</textarea>

            @error('desc')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="text" name="secteur"
                   value="{{ old('secteur') }}"
                   class="form-control @error('secteur') is-invalid @enderror"
                   placeholder="Secteur">

            @error('secteur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Ajouter</button>

    </form>

</div>
@endsection