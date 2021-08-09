@extends('layout.main')

@section('content')
<div class= "row mt-3">
    <div class="col-6 col-sm-3 mb-4">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                        <i class="bi bi-controller text-dark  h1 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                        <h3>{{$stats['max']}}</h3>
                        <span class="text-primary font-weight-bold">Liczba gier</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-3 mb-4">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                        <i class="bi bi-controller text-dark  h1 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                        <h3>{{$stats['countScoreGtFive']}}</h3>
                        <span class="text-primary font-weight-bold">Liczba gier 50+</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-3 mb-4">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                        <i class="bi bi-controller text-dark  h1 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                        <h3>{{$stats['avg']}}</h3>
                        <span class="text-primary font-weight-bold">Średnia ocena</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-3 mb-4">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                        <i class="bi bi-controller text-dark  h1 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                        <h3>{{$stats['min']}}</h3>
                        <span class="text-primary font-weight-bold">Min. ocena</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-3 mb-4">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                        <i class="bi bi-controller text-dark  h1 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                        <h3>{{$stats['max']}}</h3>
                        <span class="text-primary font-weight-bold">Maks. ocena</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-3 mb-4">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                        <i class="bi bi-controller text-dark  h1 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                        <h3>{{$stats['countScoreGtNine']}}</h3>
                        <span class="text-primary font-weight-bold">Liczba gier 90+ </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card-header font-weight-bold"><i class="bi bi-table >"></i> Najlepsze gry</div>
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
            @foreach ($topGames ?? [] as $topGame )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$topGame->title}}</td>
                    <td>{{$topGame->score}}</td>
                    <td>{{$topGame->name}}</td>
                    <td><a href="{{route('games.b.show',['game'=>$topGame->id])}}">Szczegóły</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
