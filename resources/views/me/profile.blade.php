@extends('layout.main')

@section('content')
<div class="card mb-3 mt-3" >
    <div class="row g-0">
      <div class="col-md-4">
        <img src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h5>
                <p class="card-text">Imie: {{$user->name}}</p>
                <p class="card-text">Adres e-mail: {{$user->email}}</p>
                <p class="card-text">Telefon: {{$user->phone}}</p>
                <p class="card-text">
                    <small class="btn btn-light">
                        <a href="{{route('me.edit')}}">Edytuj profil</a>
                    </small>
                </p>
        </div>
      </div>
    </div>
  </div>
@endsection