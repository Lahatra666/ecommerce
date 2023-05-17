@extends('layout.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Liste des magasins</h5>

    <!-- Default Table -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Lieu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse($magasins as $magasin)
        <tr>
          <td>{{ $magasin->idmagasin }}</td>
          <th scope="row">{{ $magasin->nommagasin }}</th> 
          <td>{{ $magasin->lieu }}</td>
          <td><a href="http://">Modifier</a></td>
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
