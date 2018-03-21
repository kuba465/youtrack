<div class="modal fade" tabindex="-1" role="dialog" id="editUserForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('main.user.edit')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">@lang('main.user.name')</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="@lang('main.user.form.name_placeholder')" required>
                    </div>
                    <div class="form-group">
                        <label for="email">@lang('main.user.email')</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="@lang('main.user.form.email_placeholder')" required>
                    </div>
                    @if(auth()->user()->can('create.projectManager'))
                        <div class="form-group">
                            <label for="userType">@lang('main.user.form.role')</label>
                            <select name="userType" class="form-control">
                                @foreach($roles as $role)
                                    {{$role->name}} {{$user->roles->pluck('name')}}
                                    <option value="{{$role->name}}" {{$user->roles[0]->name == $role->name ? 'selected' : ''}}>{{$role->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('main.buttons.close')</button>
                <button type="submit" id="saveUserChanges" data-save="{{route('user.edit', ['user' => $user])}}" class="btn btn-primary">@lang('main.buttons.save')</button>
            </div>
        </div>
    </div>
</div>