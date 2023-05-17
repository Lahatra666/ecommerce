@extends('layout.client')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Achat de laptop</h5>

      <!-- General Form Elements -->
      @foreach ($produits as $produit)
      <form method="POST" action="{{ route('confirmetransfermag') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Nom du laptop</label>
            <div class="col-sm-10">
              <input type="text" min="1" class="form-control" value="{{ $produit->nomlaptop }} {{ $produit->reference }}" disabled>
              <input type="hidden" name="idlaptop" value="{{ $produit->idlaptop }}">
            </div>
          </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Quantite envoyer</label>
                <div class="col-sm-10">
                  <input type="number" min="1" name="envoye" class="form-control" value="{{ $produit->quantite }}" disabled>
                </div>
              </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Quantite reçu</label>
                <div class="col-sm-10">
                  <input type="number" min="1" name="quantite" class="form-control">
                </div>
            </div>
            @foreach($users as $user)
            <input type="hidden" name="idmagasin" value="{{ $user->idmagasin }}">
            @endforeach
        </div>
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </form>
      @endforeach
@endsection