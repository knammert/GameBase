@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent
    <div>Lista użytkowników: <a href="{{ route('get.users') }}">Link</a></div>
@endsection

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">{{ $user['name'] }}</h5>
        <div class="card-body">
            <ul>
                <li>Id: {{ $user['id'] }}</li>
                <li>Nazwa użytkownika: {{ $user['name'] }}</li>
                <li>Adres e-mail: {{ $user['email'] }}</li>
                <li>Konto utworzone: {{ $user['created_at'] }}</li>
                <li>Telefon: {{ $user['phone'] ?? 'brak' }}</li>
            </ul>

            <a href="{{ route('get.users') }}" class="btn btn-light">Lista użytkowników</a>
        </div>
    </div>
@endsection
