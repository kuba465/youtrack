<form action="{{route('issue.create')}}" method="post" id="createIssue">
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
        <label for="project">Project</label>
        <select name="project" class="form-control" data-url="{{route('issue.ownerSelect')}}">
            <option value="0"> - </option>
            @foreach($projects as $project)
                <option value="{{$project->id}}">{{$project->name}}</option>
            @endforeach
        </select>
    </div>
</form>