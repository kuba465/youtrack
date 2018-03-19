<table class="table">
    <thead>
        <tr>
            <th colspan="3" class="text-center">
                @lang('main.project.member.plural')
                @if(auth()->user()->can('add.members.to.project'))
                    @include('modals.addMember')
                    <div class="float-right">
                        <button class="btn btn-success btn-sm" id="addMemberBtn"
                                data-url="{{route('project.addMember.form', ['project' => $project])}}" data-toggle="modal" data-target="#addMemberForm">
                            @lang('main.project.member.add')
                        </button>
                    </div>
                @endif
            </th>
        </tr>
    </thead>
    <tbody id="members">
        <tr>
            <th>@lang('main.project.member.name')</th>
            <th colspan="2">@lang('main.project.member.email')</th>
        </tr>
        @forelse($project->members as $member)
            @if($member->hasRole('project_manager')) @continue; @endif
            <tr data-project-member="{{$member->id}}">
                <td>{{$member->name}}</td>
                <td>{{$member->email}}</td>
                <td>
                    <div class="float-right">
                        <a href="{{route('user.details', ['user' => $member])}}" class="btn btn-primary btn-sm">@lang('main.project.member.details')</a>
                        @if(auth()->user()->can('remove.member.from.project'))
                            <button class="btn btn-danger btn-sm" onclick="getDeleteMemberLink($(this))"
                                    data-link="{{route('project.getDeleteMemberLink', ['project' => $project, 'member' => $member])}}"
                                    data-toggle="modal" data-target="#deleteMemberForm">
                                @lang('main.project.member.delete')
                            </button>
                        @endif
                    </div>
                </td>
            </tr>
        @empty
            <tr id="no_members">
                <td colspan="2">@lang('main.project.member.no_members')</td>
            </tr>
        @endforelse
    </tbody>
</table>
@if(auth()->user()->can('remove.member.from.project'))
    @include('modals.deleteMember')
@endif
