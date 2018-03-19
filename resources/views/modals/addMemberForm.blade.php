<form action="#" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="member">@lang('main.project.member.choose')</label>
        <select name="member" class="form-control">
            @foreach($projectMembers as $member)
                <option value="{{$member->id}}">{{$member->name}}</option>
            @endforeach
        </select>
    </div>
</form>