@extends('layout.admin')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajout produit</h5>

      <!-- General Form Elements -->
      <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Nom du produit</label>
          <div class="col-sm-10">
            <input type="text" name="nomproduit" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Prix de vente du produit</label>
          <div class="col-sm-10">
            <input type="number" min="0" name="prix" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Categorie</label>
            <div class="col-sm-10">
              <select class="form-select" name="idcategorie" aria-label="Default select example">
                <option selected>Open this select menu </option>
                @foreach ($categories as $categorie)
                <option value="{{ $categorie->idcategorie }}">{{ $categorie->nomcategorie }}</option>
                @endforeach
              </select>
            </div>
          </div>
        <div class="row mb-3">
          <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-10">
            <input class="form-control" type="file" name="image" id="formFile">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">description</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="detail" style="height: 100px"></textarea>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Submit Form</button>
          </div>
        </div>
      </form>
@endsection