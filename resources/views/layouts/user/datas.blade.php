<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                @lang('main.user.details')
                <div class="float-right">
                    <button id="editUserBtn" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editUserForm">
                        @lang('main.user.edit')
                    </button>
                    @if(auth()->user()->can('delete.users'))
                        <button id="deleteUserBtn" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUserForm">
                            @lang('main.user.delete')
                        </button>
                    @endif
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>@lang('main.user.name')</th>
            <td id="userName">{{$user->name}}</td>
        </tr>
        <tr>
            <th>@lang('main.user.email')</th>
            <td id="userEmail">{{$user->email}}</td>
        </tr>
        <tr>
            <th>@lang('main.global.created_at')</th>
            <td>{{$user->created_at}}</td>
        </tr>
        <tr>
            <th>@lang('main.global.updated_at')</th>
            <td>{{$user->updated_at}}</td>
        </tr>
        <tr>
            <th>@lang('main.user.role')</th>
            <td id="userRole">{{$user->roles[0]->description}}</td>
        </tr>
    </tbody>
</table>
@include('modals.editUser')
@include('modals.deleteUser')