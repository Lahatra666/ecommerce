@extends('layout.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Liste des produits</h5>

    <!-- Default Table -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nomproduit</th>
          <th scope="col">reference</th>
          <th scope="col">Marque</th>
          <th scope="col">Processeur</th>
          <th scope="col">RAM</th>
          <th scope="col">Disque dur</th>
          <th scope="col">prix</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse($produits as $produit)
        <tr>
          <td>{{ $produit->idlaptop }}</td>
          <th scope="row">{{ $produit->nomlaptop }}</th>
          <td>{{ $produit->reference }}</td>
          <td>{{ $produit->nommarque }}</td>
          <td>{{ $produit->nomprocesseur }}</td>
          <td>{{ $produit->ram }}</td>
          <td>{{ $produit->dur }}</td>
          <td>{{ $produit->prix }}</td>
          <td><a href="">Modifier</a></td>
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
