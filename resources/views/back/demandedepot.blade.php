@extends('layout.admin')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Default Table</h5>

      <!-- Default Table -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Valeur</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse($users as $porte)
            <td>{{ $porte->nameuser }}</td>
            @foreach($porte->portefeuille as $vola)
          <tr>
            <td>{{ $vola->valeur }}</td>
            {{-- <th scope="row">{{ $porte->portefeuille->idportefeuille }}</th> --}}
            {{-- <td>{{ $porte->portefeuille->valeur }}</td> --}}
            <td></td>
          </tr>
          @endforeach
          @empty
          <tr>
            Tsisy
          </tr>
          @endforelse
        </tbody>
      </table>
      <!-- End Default Table Example -->
    </div>
  </div>
@endsection