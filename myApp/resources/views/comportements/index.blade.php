@extends('layouts.app')

@section('title','index')
    
@section('content')
    <div class="container">
      <a href="{{route('comportement.create')}}" class="btn btn-primary">Ajouter</a>
      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>cef</th>
            <th>Sanction</th>
            <th>Autorité de décision</th>
            <th>Mise en Garde</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($comp as $c)
            @php($fullName =$c->stagiaire->nom_francais.' '.$c->stagiaire->prenom_francais )
              <tr>
                <td>{{strtoupper($fullName)}}</td>
                <td>{{$c->stagiaire->cef}}</td>
                <td>{{$c->sanction}}</td>
                <td>{{$c->autorite_dec}}</td>
                <td>{{$c->miseEnGarde}}</td>
                <td>{{$c->created_at}}</td>

              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection