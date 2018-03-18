<form action="#" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{$issue->title}}" placeholder="Enter title" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            @foreach($statuses as $status)
                <option value="{{$status->id}}" {{ $status->name == $issue->status->name ? 'selected' : '' }}>{{$status->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="priority">Priority</label>
        <select name="priority" class="form-control">
            @foreach($priorities as $priority)
                <option value="{{$priority->id}}" {{ $priority->name == $issue->priority->name ? 'selected' : '' }}>{{$priority->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group" id="ownerOfIssue">
        <label for="owner">Owner</label>
        <select name="owner" class="form-control">
            @foreach($users as $user)
                <option value="{{$user->id}}" {{$user->name == $issue->owner->name ? 'selected' : ''}}>{{$user->name}}</option>
            @endforeach
        </select>
    </div>
</form>