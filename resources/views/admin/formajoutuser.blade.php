@extends('layout.admin')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajout Marque</h5>

      <!-- General Form Elements -->
      <form method="POST" action="{{ route('storeuser') }}">
        @csrf
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Nom de l'utilisateur</label>
          <div class="col-sm-10">
            <input type="text" name="nameuser" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Email de l'utilisateur</label>
            <div class="col-sm-10">
              <input type="text" name="emailuser" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Mot de passe de l'utilisateur</label>
            <div class="col-sm-10">
              <input type="text" name="mdpuser" class="form-control">
            </div>
          </div>
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
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </form>
@endsection