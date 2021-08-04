@extends('layout.main')
@section('content')
    

    <h1>Users</h1>
   
    <table>
        <thead>
            <tr>
                <th>Index</th>
                <th>Iterations</th>
                <th>Id</th>
                <th>Name</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $users as $user )
                <tr>
                    <td>{{$loop->index}}</td>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>Link</td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    <hr/>
    <hr/>
       
        <table>
            <b>Foreach</b>
            <thead>
                <th>Id</th>
                <th>Nick</th>
                <th>Szczegóły</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td> {{ $user['id'] }}</td>
                    <td> {{ $user['name'] }}</td>
                    <td>
                         <a href="{{route(
                        'get.user.show',[
                        'id'=>$user['id']])
                    }}"> Szczegóły</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table>
            <b>For</b>
            <thead>
                <th>Id</th>
                <th>Nick</th>
                <th>Szczegóły</th>
            </thead>
            <tbody>
                @for ($i=0;$i<count($users) ;$i++)
                <tr>
                    <td> {{ $users[$i]['id'] }}</td>
                    <td> {{ $users[$i]['name'] }}</td>
                    <td>
                            <a href="{{route(
                        'get.user.show',[
                        'id'=>$user['id']])
                    }}"> Szczegóły</a>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>

        <table>
            <b>Forelse</b>
            <thead>
                <th>Id</th>
                <th>Nick</th>
                <th>Szczegóły</th>
            </thead>
            <tbody>
                @forelse ($users as$user )
                    @include('user.listRow',['userData'=>$user])
                @empty
                    <tr>Brak</tr>
                @endforelse
            </tbody>
        </table>
        <b>While</b>
            @php
                $j=0;
            @endphp
        @while ($j<count($users))     
        @include('user.listRow',['userData'=>$user])
        </tr>
            @php
                $j++;
            @endphp

        @endwhile

        <hr/>
        <hr/>
        @each('user.listRow',$users , 'userData','user.emptyRow')
        
        @switch()
            @case(1)
                
                @break
            @case(2)

                @break
        
            @default
                
        @endswitch
@endsection
    
