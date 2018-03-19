<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                @lang('main.issue.details')
                <div class="float-right">
                    <button id="editIssueBtn" data-url="{{route('issue.editForm', ['issue' => $issue->id])}}" class="btn btn-warning btn-sm"
                            data-toggle="modal" data-target="#editIssueForm">
                        @lang('main.buttons.edit')
                    </button>
                    <button id="deleteIssueBtn" data-delete="{{route('issue.delete', ['issue' => $issue->id])}}" class="btn btn-danger btn-sm"
                            data-toggle="modal" data-target="#deleteIssueForm">
                        @lang('main.buttons.delete')
                    </button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>@lang('main.issue.title')</th>
            <td id="title">{{$issue->title}}</td>
        </tr>
        <tr>
            <th>@lang('main.issue.project')</th>
            <td id="project">{{$issue->project->name}}</td>
        </tr>
        <tr>
            <th>@lang('main.issue.owner')</th>
            <td id="owner">{{$issue->owner->name}}</td>
        </tr>
        <tr>
            <th>@lang('main.issue.status')</th>
            <td id="status">{{$issue->status->name}}</td>
        </tr>
        <tr>
            <th>@lang('main.issue.priority')</th>
            <td id="priority">{{$issue->priority->name}}</td>
        </tr>
        <tr>
            <th>@lang('main.issue.estimated_time')</th>
            <td id="estimatedTime">{{$issue->stringOfTime('estimated_time')}}</td>
        </tr>
        <tr>
            <th>@lang('main.issue.work_time')</th>
            <td id="workTime">{{$issue->stringOfTime('work_time')}}</td>
        </tr>
        <tr>
            <th>@lang('main.global.created_at')</th>
            <td>{{$issue->created_at}}</td>
        </tr>
        <tr>
            <th>@lang('main.global.updated_at')</th>
            <td>{{$issue->updated_at}}</td>
        </tr>
    </tbody>
</table>
@include('modals.editIssue')
@include('modals.deleteIssue')