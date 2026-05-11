@extends('layout.app')




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
      <table class="table table-hover text-center table-bordered table-head-bg-info table-bordered-bd-info">
        <thead>
          <tr>
            {{-- <th>Nom & Prenom</th> --}}
            <th>CEF</th>
            <th>CNE</th>
            <th>Piece Justificative</th>
            <th>Motife</th>
            <th>type de retraite</th>
            <th>date retrait</th>
            <th>date retour</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($retraitBacs as $item)
            {{-- class="{{ $item->type_retrait == 'Retrait Définitif' ? 'table-danger' : 'table-warning' }}" --}}
                <tr >
                  {{-- <td>{{ strtoupper($item->stagiaire->nom_francais.' '.$item->stagiaire->prenom_francais) }}</td> --}}
                  <td>{{$item->stagiaire_id}}</td>
                  <td>{{$item->cne}}</td>
                  <td>{{$item->piece_justification}}</td>
                  <td>{{$item->motif}}</td>
                  <td>{{$item->type_retrait}}</td>
                  <td>{{$item->date_retrait}}</td>
                  <td>{{$item->date_retour}}</td>
                  <td>
                    <form action="{{ route('retraitBac.index') }}" method="GET">
                        <div class="form-check form-switch d-flex align-items-center">

                            <input 
                            checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round"
                                  type="checkbox"
                                  name="is_returned"
                                  value="1"
                                  {{ $item->is_returned ? 'checked' : '' }}
                                  onclick="return confirm('Are you sure this Stagiaire returned the Bac?')"
                                  onchange="this.form.submit()">

                        </div>
                        <input type="hidden" name="id" value="{{$item->id}}">
                    </form>
                  </td>
                  <td class="">
                    <a href="{{route('retraitBac.edit',['id'=>$item->id])}}" class="btn btn-success">Edit</a>
                    
                    

                  </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  


@endsection