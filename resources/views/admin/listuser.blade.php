@extends('layout.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Liste des Utilisateurs</h5>

    <!-- Default Table -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom user</th>
          <th scope="col">email</th>
          <th scope="col">Magasin</th>
          <th scope="col">Lieu du magasin</th>
         <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse($users as $user)
        <tr>
          <td>{{ $user->iduser }}</td>
          <th scope="row">{{ $user->nameuser }}</th>
          <td>{{ $user->emailuser }}</td>
          <td>{{ $user->nommagasin }}</td>
          <td>{{ $user->lieu }}</td>
          <td><a href="{{ route('edit',['iduser' => $user->iduser]) }}">Modifier</a></td>
          <td><a href="{{ route('affecter',['iduser' => $user->iduser]) }}">Affectation</a></td>
        </tr>
        @empty
        <tr>
          Tsisy
        </tr>
        @endforelse
      </tbody>
    </table>
    <!-- End Default Table Example -->
  </div>
</div>
@endsection
