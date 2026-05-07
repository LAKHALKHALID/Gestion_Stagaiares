@extends('layouts.app')


@section('title','index')

@section('content')
    <div class="container">
      @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">

              {{ session('success') }}

              <button type="button"
                      class="btn-close"
                      data-bs-dismiss="alert">
              </button>
          </div>
      @endif
      <a href="{{route('retraitBac.create')}}" class="btn btn-primary my-3">Ajouter</a>
      <table class="table table-hover text-center table-bordered border-primary">
        <thead>
          <tr>
            <th>Nom & Prenom</th>
            <th>CEF</th>
            <th>CNE</th>
            <th>Piece Justificative</th>
            <th>Motife</th>
            <th>type de retraite</th>
            <th>date retrait</th>
            <th>date retour</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($retraitBacs as $item)
                <tr class="{{ $item->type_retrait == 'Retrait Définitif' ? 'table-danger' : 'table-warning' }}">
                  <td>{{ strtoupper($item->stagiaire->nom_francais.' '.$item->stagiaire->prenom_francais) }}</td>
                  <td>{{$item->stagiaire->cef}}</td>
                  <td>{{$item->cne}}</td>
                  <td>{{$item->piece_justification}}</td>
                  <td>{{$item->motif}}</td>
                  <td>{{$item->type_retrait}}</td>
                  <td>{{$item->date_retrait}}</td>
                  <td>{{$item->date_retour}}</td>
                  <td class="d-flex gap-2">
                    <a href="{{route('retraitBac.edit',['id'=>$item->id])}}" class="btn btn-success">Edit</a>
                    {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                    <form action="{{route('retraitBac.destroy',['id'=>$item->id])}}" method="POST">
                      @csrf
                      @method('delete')
                      <input type="submit" value="Delete"  class="btn btn-danger"
                      onclick="return confirm('Are you sure you want to delete this item ?')">
                    </form>

                  </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection