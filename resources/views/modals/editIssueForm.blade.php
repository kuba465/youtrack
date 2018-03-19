<form action="#" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">@lang('main.issue.form.title')</label>
        <input type="text" name="title" class="form-control" value="{{$issue->title}}" placeholder="@lang('main.issue.form.title_placeholder')" required>
    </div>
    <div class="form-group">
        <label for="status">@lang('main.issue.status')</label>
        <select name="status" class="form-control">
            @foreach($statuses as $status)
                <option value="{{$status->id}}" {{ $status->name == $issue->status->name ? 'selected' : '' }}>{{$status->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="priority">@lang('main.issue.priority')</label>
        <select name="priority" class="form-control">
            @foreach($priorities as $priority)
                <option value="{{$priority->id}}" {{ $priority->name == $issue->priority->name ? 'selected' : '' }}>{{$priority->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="estimated_time">@lang('main.issue.estimated_time')</label>
        <input type="text" name="estimated_time" minlength="3" maxlength="8" value="{{$issue->estimated_time}}"
               class="form-control" placeholder="@lang('main.issue.form.estimated_time_placeholder')">
    </div>
    <div class="form-group">
        <label for="work_time">@lang('main.issue.work_time')</label>
        <input type="text" name="work_time" minlength="3" maxlength="8" value="{{$issue->work_time}}"
               class="form-control" placeholder="@lang('main.issue.form.work_time_placeholder')">
    </div>
    <div class="form-group" id="ownerOfIssue">
        <label for="owner">@lang('main.issue.owner')</label>
        <select name="owner" class="form-control">
            @foreach($users as $user)
                <option value="{{$user->id}}" {{$user->name == $issue->owner->name ? 'selected' : ''}}>{{$user->name}}</option>
            @endforeach
        </select>
    </div>
</form>