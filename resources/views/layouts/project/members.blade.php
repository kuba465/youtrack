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
                <td>
                    <div class="float-right">
                        @if(auth()->user()->can('edit.all.users'))
                            <button class="btn btn-warning btn-sm"
                                    data-delete="{{route('project.deleteMember', ['project' => $project->id, 'member' => $member->id])}}"
                                    data-toggle="modal" data-target="#editUserForm">
                                Edit User
                            </button>
                        @endif
                        @if(auth()->user()->can('remove.member.from.project'))
                            <button class="btn btn-danger btn-sm" onclick="getDeleteMemberLink($(this))"
                                    data-link="{{route('project.getDeleteMemberLink', ['project' => $project->id, 'member' => $member->id])}}"
                                    data-toggle="modal" data-target="#deleteMemberForm">
                                Delete Member
                            </button>
                        @endif
                    </div>
                </td>
            </tr>
        @empty
            <tr id="no_members">
                <td colspan="2">@lang('main.project.no_members')</td>
            </tr>
        @endforelse
    </tbody>
</table>
@if(auth()->user()->can('edit.all.users'))
    @include('modals.editUser')
@endif
@if(auth()->user()->can('remove.member.from.project'))
    @include('modals.deleteMember')
@endif
