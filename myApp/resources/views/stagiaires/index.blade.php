@extends('layouts.app')
@section('title','index')

@section('content')
    <div class="container">
      <h1 class="text-center">Gestion des stagiaires</h1>
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif
      <a href="{{route('stagiaires.create')}}" class="btn btn-primary">Ajouter New Stagiaire</a>
      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th>Cef</th>
            <th>CIN</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Annee Etude</th>
            <th>Annee Scolaire</th>
            <th>Niveau</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($stagiaires as $st)
              <tr>
                <td>{{$st->cef}}</td>
                <td>{{$st->cin}}</td>
                <td>{{$st->nom_francais}}</td>
                <td>{{$st->prenom_francais}}</td>
                <td>{{$st->annee_etude}}</td>
                <td>{{$st->nom_annee_scolaire}}</td>
                <td>{{$st->niveau_formation}}</td>
                <td class="d-flex gap-1">
                  <a href="{{route('stagiaires.show',['cef'=>$st->cef])}}" class="btn btn-info">show</a>
                  <a href="{{route('stagiaires.edit',['cef'=>$st->cef])}}" class="btn btn-success">edit</a>
                  
                  <form action="{{route('stagiaires.destroy',['cef'=>$st->cef])}}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                  </form>


                </td>

              </tr>
          @endforeach
        </tbody>
      </table>
    </div>

@endsection