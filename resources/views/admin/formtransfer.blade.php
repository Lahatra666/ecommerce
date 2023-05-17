@extends('layout.admin')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajout Marque</h5>
        <p>Stock restant : {{ $quantite }}</p>
      <!-- General Form Elements -->
      <form method="POST" action="{{ route('transfermag') }}">
        @csrf
        <input type="hidden" name="idlaptop" value=" {{ $idlaptop }}">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Magasin</label>
            <div class="col-sm-10">
              <select class="form-select" name="idmagasin" aria-label="Default select example">
                <option selected>Open this select menu </option>
                @foreach ($magasins as $magasin)
                <option value="{{ $magasin->idmagasin }}">{{ $magasin->nommagasin }}</option>
                @endforeach
              </select>
            </div>
        </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Quantite</label>
                <div class="col-sm-10">
                  <input type="text" name="quantite" class="form-control">
                </div>
              </div>
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </form>
@endsection