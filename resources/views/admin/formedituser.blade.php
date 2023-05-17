@extends('layout.admin')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Modifier Utilisateurs</h5>

      <!-- General Form Elements -->
      <form method="POST" action="{{ route('modifier') }}">
        @csrf
        @foreach($users as $user)
        <div class="row mb-3">
            <label for="inputText" class="col-sm-12 col-form-label">Magasin : {{ $user->nommagasin }}</label>
          </div>
          <input type="hidden" name="iduser" value="{{ $user->iduser }}">
          <div class="row mb-3">
            <label for="inputText" class="col-sm-12 col-form-label">Lieu du Magasin : {{ $user->lieu }} </label>
          </div>
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Nom de l'utilisateur</label>
          <div class="col-sm-10">
            <input type="text" name="nameuser" class="form-control" value="{{ $user->nameuser }}">
          </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Email de l'utilisateur</label>
            <div class="col-sm-10">
              <input type="text" name="emailuser" class="form-control" value="{{ $user->emailuser }}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Mot de passe de l'utilisateur</label>
            <div class="col-sm-10">
              <input type="text" name="mdpuser" class="form-control" value="{{ $user->mdpuser }}">
            </div>
          </div>
        <div class="row mb-4">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
        </div>
      @endforeach
      </form>
@endsection