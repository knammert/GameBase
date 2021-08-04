<tr>
    <td> {{ $userData['id'] }}</td>
    <td> {{ $userData['name'] }}</td>
        <td>
            <a href="{{
            route('get.user.show',[
            'id'=>$userData['id']
            ])
            }}">
             Szczegóły</a>
        </td>
</tr>