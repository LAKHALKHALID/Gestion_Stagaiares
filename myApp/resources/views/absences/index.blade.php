@extends('layouts.app')

@section('title', 'index')


@section('content')
    <div class="container">
        <a href="{{ route('absences.create') }}" class="btn btn-primary">Ajouter</a>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('absences.index') }}" method="get">
            <div class="row my-4">
                <div class="col-md-8">
                    <input type="text" name="cef" class="form-control" placeholder="Entrer Code Stagiaire (CEF)"
                        required>
                </div>
                <div class="col-md-4">

                    <button class="btn btn-success w-100">Search</button>
                </div>
            </div>
        </form>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#\\\\\\">
  Launch demo modal
</button>
        <table class="table table-hover text-center
            table-striped-columns">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nature</th>
                    <th>Séance</th>
                    <th>Chemin</th>
                    <th>Medecin</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($absences) > 0)
                    @foreach ($absences as $ab)
                        <tr class=" {{ $ab->justification == 'jutifiée' ? 'table-success' : '' }}">
                            <td>{{ $ab->id }}</td>
                            <td>{{ $ab->status }}</td>
                            <td>{{ $ab->seance }}</td>
                            <td>{{ $ab->chemin }}</td>
                            <td>{{ $ab->medecin }}</td>
                            <td>{{ $ab->created_at }}</td>
                            <td>
                                <a href="{{ route('absences.edit', ['id' => $ab->id]) }}" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                                <button data-absences="{{ $ab }}" data-stagiaire="{{ $ab->stagiaire }}"
                                    class="btn btn-info print_billet">Billet</button>


                            </td>

                        </tr>
                    @endforeach
                @endif

            </tbody>
            </table>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="window.print()" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_script')
    <script>
        let btnAbsences = document.querySelectorAll(".print_billet");

        btnAbsences.forEach(btn => {
            btn.onclick = (e) => {
                let absencesData = e.currentTarget.getAttribute("data-absences");
                let stagiaireData = e.currentTarget.getAttribute("data-stagiaire");


                // Convert string → object
                let absence = JSON.parse(absencesData);
                let stagiaire = JSON.parse(stagiaireData);

                let fullName = stagiaire.nom_francais+" "+stagiaire.prenom_francais
                console.log(absence);
                console.log(absence.created_at)
                                  let isoDate = "2026-05-05T13:08:53.000000Z";

                  let date = new Date(isoDate);

                  let formattedDate = 
                      (date.getMonth() + 1).toString().padStart(2, '0') + '/' +
                      date.getDate().toString().padStart(2, '0') + '/' +
                      date.getFullYear();

                  let formattedTime = 
                      date.getHours().toString().padStart(2, '0') + ':' +
                      date.getMinutes().toString().padStart(2, '0');

                  console.log(formattedDate); // 05/05/2026
                  console.log(formattedTime); // 13:08

                // Build HTML 
                let html = `
                <p class='fw-bold text-center'>Billet d entrée</p>
                <p class='fw-bold text-center'><strong>${fullName.toUpperCase()}</strong> </p>
                <p class='fw-bold text-center'><strong> Date:${formattedDate} à ${formattedTime} </strong> </p>
                <p class='fw-bold text-center'><strong>Absence ${absence.justification ?? 'justifiée'}</strong> </p>
        `;

                // Inject into modal body
                document.querySelector("#exampleModal .modal-body").innerHTML = html;

                // Show modal
                let modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.show();
            };
        });
    </script>

@endsection
