@extends('layout.main')

@section('content')


<div class="card-header font-weight-bold mt-4"><i class="bi bi-table >"></i>
    Moje gry
</div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">Lp</th>
            <th scope="col">Tytuł</th>
            <th scope="col">Kategoria</th>
            <th scope="col">Ocena</th>
            <th scope="col">Twoja ocena</th>
            <th scope="col">Opcje</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($games ?? [] as $game )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td class="">{{$game->name}}</td>
                    <td>{{ $game->genres->implode('name', ', ') }}</td>
                    <td>{{$game->score ??'brak'}}</td>
                    <td>
                        <form class="m-0" method="POST" action="{{route('me.games.rate')}}">
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="gameId" value="{{$game->id}}">
                                    <div class="col-auto">
                                        <input
                                            class="form-control mb-2"
                                            placeholder="ocena"
                                            type="number"
                                            name="rate"
                                            value="{{$game->pivot->rate}}"
                                            />
                                    </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Oceń</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td><a href="{{route('games.show',['game'=>$game->id])}}">Szczegóły</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $games->links('vendor.pagination.bootstrap-4') }}
        </div>

@endsection
