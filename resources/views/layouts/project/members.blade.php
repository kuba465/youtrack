<table class="table">
    <thead>
        <tr>
            <th colspan="3" class="text-center">
                Members
                @if(auth()->user()->can('add.members.to.project'))
                    @include('modals.addMember')
                    <div class="float-right">
                        <button class="btn btn-success btn-sm" id="addMemberBtn"
                                data-url="{{route('project.addMember.form', ['project' => $project->id])}}" data-toggle="modal" data-target="#addMemberForm">
                            Add Member
                        </button>
                    </div>
                @endif
            </th>
        </tr>
    </thead>
    <tbody id="members">
        <tr>
            <th>Name</th>
            <th colspan="2">E-mail</th>
        </tr>
        @forelse($project->members as $member)
            <tr>
                <td>{{$member->name}}</td>
                <td>{{$member->email}}</td>
                @if(auth()->user()->can('remove.member.from.project'))
                    <td>
                        <div class="float-right">
                            <button class="btn btn-danger btn-sm" id="deleteMemberBtn"
                                    data-delete="{{route('project.deleteMember', ['project' => $project->id, 'member' => $member->id])}}"
                                    data-toggle="modal" data-target="#deleteMemberForm">
                                Delete Member
                            </button>
                        </div>
                    </td>
                @endif
            </tr>
        @empty
            <tr id="no_members">
                <td colspan="2">@lang('main.project.no_members')</td>
            </tr>
        @endforelse
    </tbody>
</table>
@if(auth()->user()->can('remove.member.from.project'))
    @include('modals.deleteMember')
@endif
