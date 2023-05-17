@extends('layout.client')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajout Marque</h5>
        <p>Stock restant : {{ $quantite }}</p>
        @foreach($produits as $produit)
        <p>Nom du produit : {{ $produit->nomlaptop }}</p>
        <p>reference : {{ $produit->reference }}</p>
        @endforeach
      <!-- General Form Elements -->
      <form method="POST" action="{{ route('confirmerrenvoie') }}">
        @csrf
        <input type="hidden" name="idlaptop" value=" {{ $idlaptop }}">
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Quantite</label>
                <div class="col-sm-10">
                  <input type="text" name="quantite" class="form-control">
                </div>
              </div>
         </div>
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </form>
@endsection