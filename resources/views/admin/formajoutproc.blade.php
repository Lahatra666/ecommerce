@extends('layout.admin')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajout processeur</h5>

      <!-- General Form Elements -->
      <form method="POST" action="{{ route('storeprocesseur') }}">
        @csrf
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Nom du processeur</label>
          <div class="col-sm-10">
            <input type="text" name="nom" class="form-control">
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </form>
@endsection