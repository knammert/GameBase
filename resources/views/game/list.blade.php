@extends('layout.main')

@section('content')


<div class="card-header font-weight-bold mt-4"><i class="bi bi-table >"></i>
    Gry
</div>
    <form class="form-inline mt-2 ml-2 " action="{{ route('games.list') }}">
        <div class="form-row">
            <label class="my-1 mr-2" for="phrase">Szukana fraza:</label>
            <div class="col">
                <input type="text" class="form-control" name="phrase" placeholder="" value="{{ $phrase ?? '' }}">
            </div>
            @php
                $type = $type ?? '';
            @endphp
            <div class="col-auto">
                <select class='custom-select mr-sm-2' name="type">
                    <option @if ($type =='all') selected @endif value="all">Wszystkie rodzaje</option>
                    <option @if ($type =='game') selected @endif value="game">Gry</option>
                    <option @if ($type =='dlc') selected @endif value="dlc">DLC</option>
                    <option @if ($type =='demo') selected @endif value="demo">Demo</option>
                    <option @if ($type =='eposide') selected @endif value="eposide">Epizody</option>
                    <option @if ($type =='mod') selected @endif value="mod">Mody</option>
                    <option @if ($type =='movie') selected @endif value="movie">Filmy</option> 
                    <option @if ($type =='music') selected @endif value="music">Muzyka</option>
                    <option @if ($type =='series') selected @endif value="series">Serie</option>
                    <option @if ($type =='video') selected @endif value="video">Video</option>
                </select>
            </div>
            <button class="btn btn-primary mb-1" type="sumbit">Wyszukaj</button>
        </div>
    </form>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">Lp</th>
            <th scope="col">Tytuł</th>
            <th scope="col">Rodzaj</th>
            <th scope="col">Ocena</th>
            <th scope="col">Kategoria</th>
            <th scope="col">Opcje</th>
            <th scope="col">Opcje</th>

        </tr>
        </thead>
        <tbody>
            @foreach ($games ?? [] as $game )
                <tr>
                    <th scope="row">{{$game->id}}</th>
                    <td class="">{{$game->name}}</td>
                    <td>{{$game->type}}</td>
                    <td>{{$game->score ??'brak'}}</td>
                    <td>{{ $game->genres->implode('name', ', ') }}</td>
                    <td><a href="{{route('games.show',['game'=>$game->id])}}">Szczegóły</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $games->links('vendor.pagination.bootstrap-4') }}
        </div>

@endsection
