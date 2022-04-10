@extends('layouts.app')

@section('content')
      <div class="container">

      <form action="{{ route('api') }}" method="POST" class="mt-5">
        @csrf
        <div class="row mb-4">
          <div class="col-4">
            <div>
              <label class="form-label" for="departement">Département</label>
              <input type="number" name="departement" id="departement" class="form-control" required>
            </div>
          </div>
          <div class="col-4">
            <label class="form-label" for="departement">Catégorie</label>
            <select class="form-select" name="categorie" aria-label="categorie">
              <option value="vente">Vente</option>
              <option value="location">Location</option>
            </select>
          </div>
          <div class="col-4">
            <label class="form-label" for="departement">Type</label>
            <select class="form-select" name="type" aria-label="type">
              <option value="pro">Pro</option>
              <option value="particulier">Particulier</option>
            </select>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-4">
          <label class="form-label" for="departement">Téléphone</label>
          <select class="form-select" name="phone" aria-label="type">
              <option value="true">Oui</option>
              <option value="false">Non</option>
            </select>
          </div>
          <div class="col-4">
            <label class="form-label" for="date">Depuis le:</label>
            <input type="date" name="date" id="date" class="form-control" />
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
      </form>
      </div>
@endsection
