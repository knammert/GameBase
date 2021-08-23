<a class="nav-link" href="/">
    <div class="sb-nav-link-icon"><i class="bi bi-house-door-fill"></i></div>
    Panel
</a>
<a class="nav-link" href="{{ route('me.profile') }}">
    <div class="sb-nav-link-icon"><i class="bi bi-person-fill"></i></div>
   Mój profil
</a>

<div class="sb-sidenav-menu-heading">Użytkownicy</div>
<a class="nav-link" href="{{ route('get.users') }}">
    <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
    Użytkownicy
</a>
<div class="sb-sidenav-menu-heading">Gry</div>
<a class="nav-link" href="{{ route('games.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="bi bi-joystick"></i></div>
    Dashboard
</a>
<a class="nav-link" href="{{ route('games.list') }}">
    <div class="sb-nav-link-icon"><i class="bi bi-controller"></i></div>
    Lista
</a>
{{-- <div class="sb-sidenav-menu-heading">Gry builder</div>
<a class="nav-link" href="{{ route('games.b.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Dashboard
</a>
<a class="nav-link" href="{{ route('games.b.list') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Lista
</a>
<div class="sb-sidenav-menu-heading">Gry Eloquent</div>
<a class="nav-link" href="{{ route('games.e.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Dashboard
</a>
<a class="nav-link" href="{{ route('games.e.list') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Lista
</a> --}}
