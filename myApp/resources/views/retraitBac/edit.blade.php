@extends('layout.app')

{{-- @section('title','Edit Bac') --}}

@section('content')

<div class="container">

    <h2 class="mb-4">Edit Bac</h2>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <form action="{{route('retraitBac.update',['id'=>$bac->id])}}" method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <!-- Stagiaire ID -->
            <div class="col-md-4 mb-3">
                <label>Stagiaire ID (CEF)</label>

                <input type="text"
                       name="stagiaire_id"
                       class="form-control"
                       value="{{ $bac->stagiaire_id }}"
                       required>
            </div>

            <!-- CNE -->
            <div class="col-md-4 mb-3">
                <label>CNE</label>

                <input type="text"
                       name="cne"
                       class="form-control"
                       value="{{ $bac->cne }}"
                       required>
            </div>

            <!-- Type Retrait -->
            <div class="col-md-4 mb-3">

                <label>Type Retrait</label>

                <select name="type_retrait" class="form-select" required>

                    <option value="">-- Choisir --</option>

                    <option value="Retrait Provisoire"
                        {{ $bac->type_retrait == 'Retrait Provisoire' ? 'selected' : '' }}>
                        Retrait Provisoire
                    </option>

                    <option value="Retrait Définitif"
                        {{ $bac->type_retrait == 'Retrait Définitif' ? 'selected' : '' }}>
                        Retrait Définitif
                    </option>

                </select>
            </div>

            <!-- Motif -->
            <div class="col-md-6 mb-3">

                <label>Motif</label>

                <input type="text"
                       name="motif"
                       class="form-control"
                       value="{{ $bac->motif }}"
                       required>
            </div>

            <!-- Piece Justification -->
            <div class="col-md-6 mb-3">

                <label>Pièce de justification</label>

                <select name="piece_justification" class="form-select" required>

                    <option value="">-- Choisir --</option>

                    <option value="CIN"
                        {{ $bac->piece_justification == 'CIN' ? 'selected' : '' }}>
                        CIN
                    </option>

                    <option value="Engagement"
                        {{ $bac->piece_justification == 'Engagement' ? 'selected' : '' }}>
                        Engagement
                    </option>

                </select>
            </div>

            <!-- Date Retrait -->
            <div class="col-md-6 mb-3">

                <label>Date Retrait</label>

                <input type="date"
                       name="date_retrait"
                       class="form-control"
                       value="{{ $bac->date_retrait }}"
                       required>
            </div>

            <!-- Date Retour -->
            <div class="col-md-6 mb-3">

                <label>Date Retour</label>

                <input type="date"
                       name="date_retour"
                       class="form-control"
                       value="{{ $bac->date_retour }}"
                       required>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

    </form>

</div>

@endsection