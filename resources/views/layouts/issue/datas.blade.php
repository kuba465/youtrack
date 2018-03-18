<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                Issue Details
                <div class="float-right">
                    <button id="editIssueBtn" data-url="{{route('issue.editForm', ['issue' => $issue->id])}}" class="btn btn-warning btn-sm"
                            data-toggle="modal" data-target="#editIssueForm">
                        Edit
                    </button>
                    <button id="deleteIssueBtn" data-delete="{{route('issue.delete', ['issue' => $issue->id])}}" class="btn btn-danger btn-sm"
                            data-toggle="modal" data-target="#deleteIssueForm">
                        Delete
                    </button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Title</th>
            <td id="title">{{$issue->title}}</td>
        </tr>
        <tr>
            <th>Project</th>
            <td id="project">{{$issue->project->name}}</td>
        </tr>
        <tr>
            <th>Owner</th>
            <td id="owner">{{$issue->owner->name}}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td id="status">{{$issue->status->name}}</td>
        </tr>
        <tr>
            <th>Priority</th>
            <td id="priority">{{$issue->priority->name}}</td>
        </tr>
        <tr>
            <th>Estimated time</th>
            <td id="estimatedTime">{{$issue->stringOfTime('estimated_time')}}</td>
        </tr>
        <tr>
            <th>Work time</th>
            <td id="workTime">{{$issue->stringOfTime('work_time')}}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{$issue->created_at}}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{$issue->updated_at}}</td>
        </tr>
    </tbody>
</table>
@include('modals.editIssue')
@include('modals.deleteIssue')