<form action="{{route('issue.create')}}" method="post" id="createIssue">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">@lang('main.issue.form.title')</label>
        <input type="text" name="title" class="form-control" placeholder="@lang('main.issue.form.title_placeholder')" required>
    </div>
    <div class="form-group">
        <label for="description">@lang('main.issue.form.description')</label>
        <textarea name="description" class="form-control" placeholder="@lang('main.issue.form.description_placeholder')"></textarea>
    </div>
    <div class="form-group">
        <label for="status">@lang('main.issue.status')</label>
        <select name="status" class="form-control">
            @foreach($statuses as $status)
                <option value="{{$status->id}}" {{ $status->name == 'Open' ? 'selected' : '' }}>{{$status->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="priority">@lang('main.issue.priority')</label>
        <select name="priority" class="form-control">
            @foreach($priorities as $priority)
                <option value="{{$priority->id}}" {{ $priority->name == 'Normal' ? 'selected' : '' }}>{{$priority->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="estimated_time">@lang('main.issue.estimated_time')</label>
        <input type="text" name="estimated_time" minlength="3" maxlength="8" class="form-control"
               placeholder="@lang('main.issue.form.estimated_time_placeholder')">
    </div>
    <div class="form-group">
        <label for="project">@lang('main.issue.project')</label>
        <select name="project" class="form-control" data-url="{{route('issue.ownerSelect')}}">
            <option value="0"> - </option>
            @foreach($projects as $project)
                <option value="{{$project->id}}">{{$project->name}}</option>
            @endforeach
        </select>
    </div>
</form>