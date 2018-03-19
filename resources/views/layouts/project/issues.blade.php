<table class="table" id="issuesOfProject">
    <thead>
        <tr>
            <th colspan="7" class="text-center">
                Issues
                @if(auth()->user()->can('add.issue.to.project'))
                    <div class="float-right">
                        <button id="addIssueBtn" class="btn btn-success btn-sm"
                                data-url="{{route('project.showIssueForm', ['project' => $project])}}"
                                class="btn btn-success btn-md" data-toggle="modal" data-target="#createIssueFromProjectForm">
                            Add Issue
                        </button>
                    </div>
                @endif
            </th>
        </tr>
    </thead>
    <tbody id="issues">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Owner</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        @forelse($project->issues as $issue)
            <tr class="issueInProject" data-url="{{route('issue.details', ['issue' => $issue->id])}}">
                <td>{{$issue->title}}</td>
                <td>{{$issue->description}}</td>
                <td>{{$issue->owner->name}}</td>
                <td>{{$issue->status->name}}</td>
                <td>{{$issue->priority->name}}</td>
                <td>{{$issue->created_at}}</td>
                <td>{{$issue->updated_at}}</td>
            </tr>
        @empty
            <tr id="no_issues">
                <td colspan="2">@lang('main.project.no_issues')</td>
            </tr>
        @endforelse
    </tbody>
</table>
@include('modals.createIssueFromProject')