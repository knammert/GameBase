@extends('layout.main')

@section('content')


    <div class="card mt-3">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Lista użytkowników</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Lp</th>
                            <th>Id</th>
                            <th>Nick</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td><a href="{{ route('get.user.show', ['id' => $user['id']]) }}">Szczegóły</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
