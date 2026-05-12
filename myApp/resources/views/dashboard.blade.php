@extends('layout.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-danger">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <img src="./images/calender.png" alt="">
                    <p class="text-white fw-bold mb-0 me-3 text-center mt-1">
                        <span class="d-block fs-4"> Absences</span>
                        <span class="fs-3"> {{count($absences)}}</span>

                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <img src="./images/team.png" alt="">
                    <p class="text-white fw-bold mb-0 me-3 text-center mt-1">
                        <span class="d-block fs-4"> stagiaires</span>
                        <span class="fs-3"> {{count($stagiaires)}}</span>

                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning" >
                <div class="card-body d-flex align-items-center justify-content-between">
                    <img src="./images/absence.png" alt="">
                    <p class="text-white fw-bold mb-0 me-3 text-center mt-1">
                        <span class="d-block fs-4"> Retrait Bac</span>
                        <span class="fs-3"> {{count($retraitbac)}}</span>

                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <img src="./images/calender.png" alt="">
                    <p class="text-white fw-bold mb-0 me-3 text-center mt-1">
                        <span class="d-block fs-4"> No active</span>
                        <span class="fs-3"> {{  ($stagiaires_no_active)}}</span>

                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
