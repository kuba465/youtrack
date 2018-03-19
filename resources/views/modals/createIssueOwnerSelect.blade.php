<div class="form-group" id="ownerOfIssue">
    <label for="owner">@lang('main.issue.owner')</label>
    <select name="owner" class="form-control">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
</div>