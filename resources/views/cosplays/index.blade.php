@extends('dashboard')

@section('content')
<div class="container">
    <div class="row">
        @foreach($cosplays as $cosplay)
        <div class="card col-md-3" style="width: 18rem;">
            <img src="{{ $cosplay->image }}" class="card-img-top" alt="{{ $cosplay->nom }}">
            <div class="card-body">
                <h5 class="card-title">{{ $cosplay->nom }}</h5>
                <p class="card-text">{{ $cosplay->personnage }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $cosplay->origine }}</li>
                <li class="list-group-item">{{ $cosplay->n }}</li>
                <li class="list-group-item">Posté par {{ $cosplay->name }}</li>        
            </ul>
            <div class="card-body">
                <a href="{{ route('cosplays.edit', $cosplay->id) }}" class="card-link">Editer</a>
                <form action="{{ route('cosplays.destroy', $cosplay->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary btn-sm" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection