<a class="nav-link" href="/">
    <div class="sb-nav-link-icon"><i class="bi bi-house-door-fill"></i></div>
    Panel
</a>

<div class="sb-sidenav-menu-heading">Konto</div>
<a class="nav-link" href="{{ route('me.profile') }}">
    <div class="sb-nav-link-icon"><i class="bi bi-person-fill"></i></div>
   Mój profil
</a>
<a class="nav-link" href="{{ route('me.games.list') }}">
    <div class="sb-nav-link-icon"><i class="bi bi-joystick"></i></div>
   Gry
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

<div class="sb-sidenav-menu-heading">Admin panel</div>
<a class="nav-link" href="{{ route('get.users') }}">
    <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
    Użytkownicy
</a>