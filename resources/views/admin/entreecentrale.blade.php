@extends('layout.admin')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Achat de laptop</h5>

      <!-- General Form Elements -->
      <form method="POST" action="{{ route('achatlaptop') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Laptop</label>
            <div class="col-sm-10">
              <select class="form-select" name="idlaptop" aria-label="Default select example">
                <option selected>Open this select menu </option>
                @foreach ($produits as $produit)
                <option value="{{ $produit->idlaptop }}">{{ $produit->nomlaptop }} references : {{ $produit->reference }}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Quantite</label>
            <div class="col-sm-10">
              <input type="number" min="1" name="quantite" class="form-control">
            </div>
          </div>
    
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </form>
@endsection