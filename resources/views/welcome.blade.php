@extends('layouts.app')

@section('content')
      <div class="container">

      <form action="{{ route('api') }}" method="POST" class="mt-5">
        @csrf
        <div class="row mb-4">
          <div class="col-4">
            <label class="form-label" for="departement">Catégorie</label>
            <select class="form-select" name="categorie" aria-label="categorie">
              <option value="vente">Vente</option>
              <option value="location">Location</option>
            </select>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-4">
            <label class="form-label" for="date">Depuis le:</label>
            <input type="date" name="date" id="date" value="<?php echo date('Y-m-d', time() - 86400); ?>" class="form-control" />
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Collecter</button>
      </form>
      </div>
@endsection
