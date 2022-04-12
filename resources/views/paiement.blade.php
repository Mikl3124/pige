@extends('layouts.app')

@section('content')
<div class="container">
  <div class="text-center my-3">
    <h1>Récapitulatif</h1>
  </div>
  <div>
    <h4>Vous avez choisi:</h4>
    <ul>
      @foreach ($departements as $departement)
        <li>{{ $departement->departement_nom }} ({{ $departement->departement_code }}) </li>
      @endforeach
    </ul>
  </div>

</div>



@endsection
