@extends('layout.client')

@foreach($errors->all() as $error)
    {{ $error }}
@endforeach
<main id="main" class="main">
<!-- End Page Title -->
  <section class="section">

    <form action="{{ route('savecommande')}}" method="post">
    @csrf
    @foreach ($users as $user)
    @forelse ($cart as $item)
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-archive"> {{ $item['produit']->nomproduit }}</i>   
        <p> Prix :{{ $item['quantity'] }}</p>
        <p> Nombre : {{ $item['produit']->prix }}</p>
        <input type="hidden" name="idproduit[]" value="{{ $item['produit']->idproduit }}">
        <input type="hidden" name="iduser[]" value="{{ $user->iduser }}">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> 
    @empty
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-archive"> Pas de commande </i>   
      </div> 
    @endforelse
    @endforeach
      <input class="btn btn-primary" type="submit" value="Valider le commande">
    </form>
  </section>

</main>
@section('content')
@endsection