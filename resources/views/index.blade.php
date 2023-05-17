@extends('layout.default')

@foreach($errors->all() as $error)
    {{ $error }}
@endforeach
<main id="main" class="main">
<!-- End Page Title -->
@foreach($categorie as $c)
  <h1>{{ $c->nomcategorie }}</h1>
  <section class="section">
    @forelse($c->produits as $produit)
    <div class="row">
      <div class="col-lg-6">
        {{-- Card --}}
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $produit->nomproduit }}</h5>
            <p>Prix : {{ $produit->prix }}</p>
            <p>Stock : {{ $produit->stock->quantite }} {{ $produit->stock->unite }}</p>
            <p>Detail : </p>
            <p>{{ $produit->detail }}</p>
            <!-- Slides with fade transition -->
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ Storage::url($produit->image) }}" class="d-block w-100" alt="...">
                </div>
              </div>
              <br>
              <form class="col-sm-12" action="{{ route('addToCart') }}">
                @csrf
                <input type="hidden" name="idproduit" value="{{ $produit->idproduit }}">
                  <p><input type="number" placeholder="quantite" class="form-control" name="quantity"></p> 
                  <p><input type="submit" class="btn btn-primary" value="Ajouter au panier"></p>
              </form>
              <button type="button" class="btn btn-primary">Detail</button>

              </div><!-- End Slides with fade transition -->
            </div>
          </div>
        </div>
      </div>
    </div>
    @empty
    <div class="alert alert-danger alert-dismissible fade show col-lg-6" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
        Aucun
    </div>
    @endforelse
    @endforeach
        {{-- Card --}}
  
  </section>

</main>
@section('content')
@endsection