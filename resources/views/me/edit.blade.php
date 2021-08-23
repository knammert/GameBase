@extends('layout.main')

@section('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<div class="card mb-3 mt-3 " >
    <div class="row g-0">
        <div class="col-md-4">
            @if ($user->avatar)
            <div class="col-md-4">
                <img src="{{asset('storage/'.$user->avatar)}}" alt="... "  class="user-avatar">
            </div>
            @else
                <img src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" class="img-fluid rounded-start" alt="...">
            @endif
        </div>
      <div class="col-md-8">
        <div class="card-body">
            <form action="{{ route('me.update') }}" method="post" enctype="multipart/form-data">
                <!-- X-XSRF-TOKEN -->
                @csrf
                <div class="form-group">
                    <div class='form-group'>
                        <label for="avatar">Wybierz avatar...</label>
                        <input
                            type="file"
                            class="form-control-file"
                            id="avatar"
                            name="avatar"
                            accept="image/*"
                            />
                        @error('avatar')
                            <div class='invalid-feedback d-block'>{{$message}}</div>
                        @enderror
                    </div>
                    <label for="name">Nazwa</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                    />
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Adres email</label>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                    >
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input
                        type="text"
                        class="form-control @error('phone') is-invalid @enderror"
                        id="phone"
                        name="phone"
                        value="{{ old('phone', $user->phone) }}"
                    >
                    @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Zapisz dane</button>
                <a href="{{ route('me.profile') }}" class="btn btn-secondary">Anuluj</a>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection