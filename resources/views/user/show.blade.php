
@extends('layout.main')

@section('title','Użytkownik')
    

@section('sidebar')
@parent
Sidebar z dziecka
    
@endsection

@auth
    Jest zalogowany
@endauth

@guest
    To jest gość
@endguest

@section('content')
    <h3>Informacje o użytkowniku</h3>
    <ul>
        <li>id: {{$user['id']}}</li>
        <li>Imie: {{$user['firstName']}}</li>
        <li>Nazwisko: {{$user['lastName']}}</li>
        <li>Miasto: {{$user['city']}}</li>
        <li>
            Wiek: {{$user['age']}} 
            @if ($user['age']>=18)
                (jest to osoba dorosła)      
            @elseif (($user['age']>=16))
                (nastolatek)
            @else
                (dziecko)
            @endif
        </li>
        @isset($user)
            Nick:xxx            
        @endisset
    </ul>
    <div>

    </div>
@endsection