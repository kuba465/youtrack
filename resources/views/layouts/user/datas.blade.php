<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                My Datas
            @include('layouts.user.buttons.edit')
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Name</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{$user->created_at}}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{$user->updated_at}}</td>
        </tr>
        {{--<tr>--}}
            {{--<th>Role</th>--}}
            {{--<td>{{$user->roles[0]->description}}</td>--}}
        {{--</tr>--}}
    </tbody>
</table>