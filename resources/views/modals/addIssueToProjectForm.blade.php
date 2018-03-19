<form action="#" method="post" id="addIssueToProject">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title of issue</label>
        <input type="text" name="title" class="form-control" placeholder="Enter title of issue" required>
    </div>
    <div class="form-group">
        <label for="description">Description of issue</label>
        <textarea name="description" class="form-control" placeholder="Enter description"></textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            @foreach($statuses as $status)
                <option value="{{$status->id}}" {{ $status->name == 'Open' ? 'selected' : '' }}>{{$status->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="priority">Priority</label>
        <select name="priority" class="form-control">
            @foreach($priorities as $priority)
                <option value="{{$priority->id}}" {{ $priority->name == 'Normal' ? 'selected' : '' }}>{{$priority->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="estimated_time">Estimated time</label>
        <input type="text" name="estimated_time" minlength="3" maxlength="8" class="form-control" placeholder="dd:hh:mm or hh:mm">
    </div>
    <div class="form-group">
        <label for="project">Project</label>
        <select name="project" class="form-control" data-url="{{route('issue.ownerSelect')}}" disabled>
            <option value="{{$project->id}}">{{$project->name}}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="owner">Owner</label>
        <select name="owner" class="form-control">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
</form>