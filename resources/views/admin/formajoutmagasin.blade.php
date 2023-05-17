@extends('layout.admin')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajout magasin</h5>

      <!-- General Form Elements -->
      <form method="POST" action="{{ route('storemagasin') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Nom du magasin</label>
          <div class="col-sm-10">
            <input type="text" name="nommagasin" class="form-control">
          </div>
        </div>
            <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Lieu</label>
            <div class="col-sm-10">
              <input type="text" name="lieu" class="form-control">
            </div>
          </div>
    
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </form>
@endsection