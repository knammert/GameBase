@extends('layout.main')

@section('content')
<div class="card mt-4">
    @if(!empty($game))
        <h5 class="card-header">{{$game->title}}</h5>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{$game->id}}</li>
                <li class="list-group-item">{{$game->title}}</li>
                <li class="list-group-item">{{$game->publisher}}</li>
                <li class="list-group-item">{{$game->genre->name}}</li>
                <li class="list-group-item">{{$game->description}}</li>
            </ul>
        </div>
        <a href="{{route('games.e.list')}}" class="btn btn-dark">Powrót do listy</a>
    @else
        <h5 class="card-header">Brak elementów do wyświetlenia</h5>
    @endif
</div>
@endsection
