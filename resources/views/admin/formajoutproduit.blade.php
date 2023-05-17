@extends('layout.admin')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajout Laptop</h5>

      <!-- General Form Elements -->
      <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Nom du laptop</label>
          <div class="col-sm-10">
            <input type="text" name="nomlaptop" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Reference</label>
          <div class="col-sm-10">
            <input type="text" min="0" name="reference" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Prix de vente</label>
          <div class="col-sm-10">
            <input type="text" min="0" name="prix" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Marque</label>
          <div class="col-sm-10">
            <select class="form-select" name="idmarque" aria-label="Default select example">
              <option selected>Open this select menu </option>
              @foreach ($marques as $marque)
              <option value="{{ $marque->idmarque }}">{{ $marque->nommarque }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Processeur</label>
          <div class="col-sm-10">
            <select class="form-select" name="idprocesseur" aria-label="Default select example">
              <option selected>Open this select menu </option>
              @foreach ($processeurs as $processeur)
              <option value="{{ $processeur->idprocesseur }}">{{ $processeur->nomprocesseur }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">RAM</label>
          <div class="col-sm-10">
            <input type="number" min="0" name="ram" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Disque dur</label>
          <div class="col-sm-10">
            <input type="number" min="0" name="dur" class="form-control"> GB
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-10">
            <input class="form-control" type="file" name="image" id="formFile">
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Ajouter le produit</button>
          </div>
        </div>
      </form>
@endsection