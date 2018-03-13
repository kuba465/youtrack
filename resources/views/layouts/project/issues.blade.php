<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                Issues
                @if(auth()->user()->getRole()->id !== 3)
                    <div class="float-right">
                        <button id="addMember" class="btn btn-success btn-sm">
                            Add Issue
                        </button>
                    </div>
                @endif
            </th>
        </tr>
    </thead>
    <tbody>
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
                <tr>
                    <td>{{$issue->title}}</td>
                    <td>{{$issue->description}}</td>
                    <td>{{$issue->owner->name}}</td>
                    <td>{{$issue->status->name}}</td>
                    <td>{{$issue->priority->name}}</td>
                    <td>{{$issue->created_at}}</td>
                    <td>{{$issue->updated_at}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">@lang('main.project.no_issues')</td>
                </tr>
            @endforelse
    </tbody>
</table>