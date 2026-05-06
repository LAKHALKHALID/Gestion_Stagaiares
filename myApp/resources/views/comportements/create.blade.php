@extends('layouts.app')

@section('title','create')
    
@section('content')

    <div class="container">
      <form action="{{route('comportement.store')}}" method="post">
        @csrf
        <div class="row mb-3">
          <div class="col-md-2"></div>
          <div class="col-md-6 d-flex">
            <label for="">Motif de la Sanction</label>
            <select name="motif" class="form-select" >
              <option value="mofif1">mofif1</option>
              <option value="mofif2">mofif2</option>
              <option value="mofif3">mofif3</option>

            </select>
          </div>
          <div class="col-md-4">
            <input type="text" name="cef" class="form-control" placeholder="Entre CEF of the stagiaire">
          </div>


        </div>
        <fieldset>
          <legend>Sanction</legend>
          <div class="row">
            <div class="col-md-3">
              <input type="radio" name="sanction" value="Mise en gard" class="form-check-input">
              <label for="">Mise en garde</label>
            </div>
            <div class="col-md-3">
              <input type="radio" name="sanction" value="Avertissement" class="form-check-input">
              <label for="">Avertisement</label>
            </div>
            <div class="col-md-3">
              <input type="radio" name="sanction" value="Blame" class="form-check-input">
              <label for="">Blame</label>
            </div>
        </div>
        </fieldset>

        <fieldset class="my-4">
          <legend>Autorité de décision</legend>
            <div class="row">
              <div class="col-md-3">
                <input type="radio" name="autorite_dec" value="Survillance générale" class="form-check-input">
                <label for="">Surveillance générale</label>
              </div>
              <div class="col-md-3">
                <input type="radio" name="autorite_dec" value="Directeur" class="form-check-input">
                <label for="">Directeur</label>
              </div>
              <div class="col-md-3">
                <input type="radio" name="autorite_dec" value="Conseil de dicipline" class="form-check-input">
                <label for="">Conseil de dicipline</label>
              </div>
          </div>
        </fieldset>

        <fieldset class="my-4">
          <legend>Mise en garde</legend>
            <div class="row">
              <div class="col-md-3">
                <input type="radio" name="miseEnGarde" value="1ère Mise en garde" class="form-check-input">
                <label for="">1ère Mise en garde</label>
              </div>
              <div class="col-md-3">
                <input type="radio" name="miseEnGarde" value="2ème Mise en garde" class="form-check-input">
                <label for="">2ème Mise en garde</label>
              </div>
              <div class="col-md-3">
                <input type="radio" name="miseEnGarde" value="3ème Mise en garde" class="form-check-input">
                <label for="">3ème Mise en garde</label>
              </div>
              <div class="col-md-3">
                <input type="radio" name="miseEnGarde" value="4ème Mise en garde" class="form-check-input">
                <label for="">4ème Mise en garde</label>
              </div>
          </div>
        </fieldset>

        <fieldset class="my-5">
          <legend>Date</legend>
          <label for="">Date debut : </label>
          <input type="date" name='date' class="form-control">
        </fieldset>
        <button class="btn btn-success">Ajouter</button>
      </form>
    </div>

@endsection