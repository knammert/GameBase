@extends('layout.main')

@section('content')


<div class="card-header font-weight-bold mt-4"><i class="bi bi-table >"></i> Gry</div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Lp</th>
            <th scope="col">Tytuł</th>
            <th scope="col">Ocena</th>
            <th scope="col">Kategoria</th>
            <th scope="col">Opcje</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($games ?? [] as $game )
                <tr>
                    <th scope="row">{{$game->id}}</th>
                    <td>{{$game->title}}</td>
                    <td>{{$game->score}}</td>
                    <td>{{$game->genre->name}}</td>
                    <td><a href="{{route('games.e.show',['game'=>$game->id])}}">Szczegóły</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $games->links('vendor.pagination.bootstrap-4') }}
        </div>

@endsection
