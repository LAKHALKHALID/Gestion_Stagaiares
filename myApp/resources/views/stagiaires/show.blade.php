@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Détails du stagiaire</h3>

        <a href="{{ route('stagiaires.index') }}" class="btn btn-light border">
            ← Retour à la liste
        </a>
    </div>

    <!-- Top Card -->
    <div class="card shadow-sm p-4 mb-4 bg-white">
        <div class="row align-items-center">

            <!-- Avatar + Name -->
            <div class="col-md-6 d-flex align-items-center gap-3">
                <img src="https://ui-avatars.com/api/?name={{ $stagiaire->prenom_francais }}+{{ $stagiaire->nom_francais }}&size=100"
                      class="rounded-circle" />

                <div>
                    <h4 class="mb-1">
                        {{ $stagiaire->prenom_francais }} {{ $stagiaire->nom_francais }}
                    </h4>

                    <span class="badge bg-success">Actif</span>
                    <span class="badge bg-primary">Inscrit</span>
                </div>
            </div>

            <!-- Right Info -->
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <p><strong>CEF:</strong> {{ $stagiaire->cef }}</p>
                <p><strong>CIN:</strong> {{ $stagiaire->cin }}</p>
                <p><strong>Année:</strong> {{ $stagiaire->nom_annee_scolaire }}</p>
            </div>
        </div>
    </div>

    <!-- Grid Info -->
    <div class="row g-3">

        <!-- Personal -->
        <div class="col-md-6">
            <div class="card  shadow-sm">
                <div class="card-header">
                  <h5 class="text-primary fw-bold my-2">Informations personnelles</h5>
                </div>
                <div class="card-body">
                    <p class="d-flex justify-content-between"><span class="fw-bold" >Nom (Français)</span> <span class="me-5 fw-bolder">{{ $stagiaire->nom_francais }}</span></p>
                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Prénom</span>
                        <span class="me-5 fw-bolder">{{ $stagiaire->prenom_francais }}</span>
                    </p>

                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Nom (Arabe)</span>
                        <span class="me-5 fw-bolder">{{ $stagiaire->nom_arabe }}</span>
                    </p>

                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Prénom (Arabe)</span>
                        <span class="me-5 fw-bolder">{{ $stagiaire->prenom_arabe }}</span>
                    </p>

                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Date naissance</span>
                        <span class="me-5 fw-bolder">{{ $stagiaire->date_naissance }}</span>
                    </p>

                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Lieu naissance</span>
                        <span class="me-5 fw-bolder">{{ $stagiaire->lieu_naissance }}</span>
                    </p>
                </div>
                
                
            </div>
        </div>

        <!-- Academic -->
        <div class="col-md-6">
            {{-- <div class="card p-3 shadow-sm">
                <h5>Informations académiques</h5>
                <hr>

                <p><strong>Niveau:</strong> {{ $stagiaire->niveau_formation }}</p>
                <p><strong>Type:</strong> {{ $stagiaire->type_formation }}</p>
                <p><strong>Année étude:</strong> {{ $stagiaire->annee_etude }}</p>
                <p><strong>Début formation:</strong> {{ $stagiaire->date_demarrage_formation }}</p>
            </div> --}}
            <div class="card shadow-sm">
    <div class="card-header">
        <h5 class="text-primary fw-bold my-2">Informations académiques</h5>
    </div>

    <div class="card-body">
        <p class="d-flex justify-content-between">
            <span class="fw-bold">Niveau</span>
            <span class="me-5 fw-bolder">{{ $stagiaire->niveau_formation }}</span>
        </p>

        <p class="d-flex justify-content-between">
            <span class="fw-bold">Type</span>
            <span class="me-5 fw-bolder">{{ $stagiaire->type_formation }}</span>
        </p>

        <p class="d-flex justify-content-between">
            <span class="fw-bold">Année étude</span>
            <span class="me-5 fw-bolder">{{ $stagiaire->annee_etude }}</span>
        </p>

        <p class="d-flex justify-content-between">
            <span class="fw-bold">Début formation</span>
            <span class="me-5 fw-bolder">{{ $stagiaire->date_demarrage_formation }}</span>
        </p>
    </div>
</div>
        </div>

        <!-- Contact -->
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5>Contact</h5>
                <hr>

                <p><strong>Téléphone:</strong> {{ $stagiaire->tel }}</p>
            </div>
        </div>

        <!-- Extra -->
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5>Informations supplémentaires</h5>
                <hr>

                <p><strong>Note:</strong> {{ $stagiaire->note }} / 20</p>
                <p><strong>Créé:</strong> {{ $stagiaire->created_at }}</p>
                <p><strong>Mis à jour:</strong> {{ $stagiaire->updated_at }}</p>
            </div>
        </div>

    </div>

    <!-- Actions -->
    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('stagiaires.edit', $stagiaire->cef) }}" class="btn btn-primary">
            Modifier
        </a>

        <form action="{{ route('stagiaires.destroy', $stagiaire->cef) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">
                Supprimer
            </button>
        </form>
    </div>

</div>
@endsection