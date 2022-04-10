@extends('layouts.app')

@section('content')
      <div class="container">
        <h5>Il y a {{ $response->count() }} annonces</h5>
        <div class="row ">
          @foreach ($response as $ads)
            <div class="col-3 mt-3 mx-2 card">
              @isset ($ads->image)
                <img class="card-img-top" src="{{ $ads->image }}">
              @else
                <img class="card-img-top" src="https://via.placeholder.com/120">
              @endif
              <div class="card-body">
                <h6 class="card-title">{{ $ads->title}}</h6>
                <p class="card-title">{{ $ads->created_at }}</p>
                <a href="{{ $ads->url }}">Voir</a>
              </div>
              <div class="card-body text-center">
                <form action="{{ route('send-sms') }}" method="POST" class="mt-5">
                  @csrf
                  <input type="hidden" name="phone" value="{{ $ads->phone }}">
                  <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </div>
@endsection
