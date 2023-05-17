@extends('layout.admin')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Modifier Utilisateurs</h5>

      <!-- General Form Elements -->
      <form method="POST" action="{{ route('affecteruser') }}">
        @csrf
        @foreach($users as $user)
        <div class="row mb-3">
            <label for="inputText" class="col-sm-12 col-form-label">Magasin Actuel: {{ $user->nommagasin }}</label>
          </div>
          <input type="hidden" name="iduser" value="{{ $user->iduser }}">
          <div class="row mb-3">
            <label for="inputText" class="col-sm-12 col-form-label">Lieu du Magasin Actuel : {{ $user->lieu }} </label>
          </div>
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Nom de l'utilisateur</label>
          <div class="col-sm-10">
            <input type="text" name="nameuser" class="form-control" value="{{ $user->nameuser }}" disabled>
          </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Email de l'utilisateur</label>
            <div class="col-sm-10">
              <input type="text" name="emailuser" class="form-control" value="{{ $user->emailuser }}" disabled>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Magasin</label>
            <div class="col-sm-10">
              <select class="form-select" name="idmagasin" aria-label="Default select example">
                <option selected>Open this select menu </option>
                @foreach ($magasins as $magasin)
                <option value="{{ $magasin->idmagasin }}">{{ $magasin->nommagasin }} {{ $magasin->lieu }}</option>
                @endforeach
              </select>
            </div>
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
        </div>
      @endforeach
      </form>
@endsection