@extends('dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="{{ route('cosplays.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom du cosplayeur</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="personnage">Personnage incarné</label>
                    <input type="text" class="form-control" id="personnage" name="personnage">
                </div>
                <div class="form-group">
                    <label for="origine">Origine de votre personnage</label>
                    <input type="text" class="form-control" id="origine" name="origine">
                </div>
                <div class="form-group">
                    <label for="categorie_id">Categorie</label>
                    <select class="form-control" id="categorie_id" name="categorie_id">
                        @foreach($categories as $categorie)
                        <option value=" {{$categorie->id}} "> {{$categorie->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection