@extends('dashboard')

   

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">Cosplay de {{ $cosplay->personnage }} de {{ $cosplay->origine }} par {{ $cosplay->nom }}</h3>
                    <br/>
                    <h2>{{ $cosplay->nom }}</h2>
                    <p>
                        {{ $cosplay->personnage }}
                    </p>
                    <hr />
                    <h4>Display Comments</h4>
                    <?php var_dump($commentaires) ?>
  

                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('commentaires.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="comment"></textarea>
                            <input type="hidden" name="cosplay_id" value="{{ $cosplay->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection