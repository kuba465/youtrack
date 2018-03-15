<div class="modal fade" tabindex="-1" role="dialog" id="editUserForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter e-mail" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="Confirm password" required>
                    </div>
                    @if(auth()->user()->can('create.projectManager'))
                        <div class="form-group">
                            <label for="userType">Choose type of user</label>
                            <select name="userType" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="saveUserChanges" data-save="{{route('user.edit', ['user' => $user])}}" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>