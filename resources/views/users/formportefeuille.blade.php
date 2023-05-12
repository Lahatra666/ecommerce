@extends('layout.client')

@foreach($errors->all() as $error)
    {{ $error }}
@endforeach
<main id="main" class="main">
<!-- End Page Title -->
  <section class="section">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajouter dans mon portefeuille</h5>

      <!-- General Form Elements -->
      <form method="POST" action="{{ route('addportefeuille') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Valeurs</label>
          <div class="col-sm-10">
            <input type="number" name="valeur" class="form-control" placeholder="Ajout au portefeuille">
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </form>
  </section>

</main>
@section('content')
@endsection