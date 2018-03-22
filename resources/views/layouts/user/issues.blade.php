<table class="table" id="issuesOfUser">
    <thead>
        <tr>
            <th colspan="6" class="text-center">
                @lang('main.issue.issue_plural')
                @if(auth()->user()->can('add.issue.to.project'))
                    <div class="float-right">
                        <button id="addIssueBtn" class="btn btn-success btn-sm"
                                data-url="{{route('issue.createForm', ['user' => $user])}}"
                                class="btn btn-success btn-md" data-toggle="modal" data-target="#createIssueFromUserForm">
                            @lang('main.issue.create')
                        </button>
                    </div>
                @endif
            </th>
        </tr>
    </thead>
    <tbody id="issues">
        <tr>
            <th>@lang('main.issue.title')</th>
            <th>@lang('main.issue.description')</th>
            <th>@lang('main.issue.status')</th>
            <th>@lang('main.issue.priority')</th>
            <th>@lang('main.global.created_at')</th>
            <th>@lang('main.global.updated_at')</th>
        </tr>
        @forelse($user->issues as $issue)
            <tr class="issueInUser" data-url="{{route('issue.details', ['issue' => $issue->id])}}">
                <td>{{$issue->title}}</td>
                <td>{{$issue->description}}</td>
                <td>{{$issue->status->name}}</td>
                <td>{{$issue->priority->name}}</td>
                <td>{{$issue->created_at}}</td>
                <td>{{$issue->updated_at}}</td>
            </tr>
        @empty
            <tr id="no_issues">
                <td colspan="6">@lang('main.issue.no_issues')</td>
            </tr>
        @endforelse
    </tbody>
</table>
@include('modals.createIssueFromUser')