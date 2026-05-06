@extends('layouts.app')

@section('title','create')


@section('content')
<div class="container mt-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Ajouter une absence</h5>
        </div>

        <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            <form action="{{ route('absences.store') }}" method="POST">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Code Stagiaire (CEF)</label>
                        <input 
                            type="text" 
                            name="cef" 
                            class="form-control" 
                            placeholder="Entrer le CEF" 
                            required
                        >
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="form-label fw-bold">Choisir les séances</label>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="seance[]" value="8h30-11h00" id="s1">
                                <label class="form-check-label" for="s1">
                                    8h30 - 11h00
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="seance[]" value="11h00-13h30" id="s2">
                                <label class="form-check-label" for="s2">
                                    11h00 - 13h30
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="seance[]" value="13h30-16h00" id="s3">
                                <label class="form-check-label" for="s3">
                                    13h30 - 16h00
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="seance[]" value="16h00-18h30" id="s4">
                                <label class="form-check-label" for="s4">
                                    16h00 - 18h30
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="text-end">
                    <button class="btn btn-success px-4">
                        <i class="bi bi-save"></i> Enregistrer
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection