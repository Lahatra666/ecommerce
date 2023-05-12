@extends('layout.app')
@section('content')
    <h1>Gestion de portion</h1>
    <h2>Liste des portion</h2>
    @if($portions->count()>0)
    <table border="1">
        <tr>
            <th>Nom du route</th>
            <th>Debut </th>
            <th>Fin </th>
            <th>Distance</th>
            <th>Budget entretien</th>
            <th>Etat</th>
            <th>Action</th>
        </tr>
        <tr>
            @foreach ($portions as $portion)
                <tr>
                    <td>{{ $portion->nomroute }}</td>
                    <td>{{ $portion->debut }}</td>
                    <td>{{ $portion->fin }}</td>
                    <td>{{ ($portion->fin)-($portion->debut) }}</td>
                    <td>{{ $portion->budget }} Ariary</td>
                    <td>{{ $portion->etat }}</td>
                    <td><a href="{{ route('portion.showportion',['idroute' => $portion->idportion]) }}">Entretien</a></td>
                </tr>
            @endforeach
        </tr>
    </table>
    @else
        <span>Aucun</span>
    @endif
    <br>
    <h2>Nouveau portion</h2>
    <form method="POST" action="{{ route('portion.addportion') }}" >
        @csrf
        <input type="hidden" name="idroute" value="{{ request('idroute') }}">
        <p>pk debut : <input type="number" min="0" name="debut" placeholder="debut"></p>
        <p>pk fin : <input type="number" min="0" name="fin" placeholder="fin"></p>
        <p>Etat
            <select name="etat">
                <option value="1">0% de mauvaise route</option>
                <option value="2">20% de mauvaise route</option>
                <option value="3">40% de mauvaise route</option>
                <option value="4">80% de mauvaise route</option>
            </select>
        </p>
        <p><input type="submit" value="Ajouter"></p>
    </form>
@endsection