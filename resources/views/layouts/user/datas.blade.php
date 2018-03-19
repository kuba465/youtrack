<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                @lang('main.user.details')
                <button id="editUserBtn" class="btn btn-primary float-right btn-sm">
                    @lang('main.buttons.edit')
                </button>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>@lang('main.user.name')</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>@lang('main.user.email')</th>
            <td>{{$user->email}}</td>
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
            <td>{{$user->roles[0]->description}}</td>
        </tr>
    </tbody>
</table>