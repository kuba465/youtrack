<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                Members
                @if(auth()->user()->can('add.members.to.project'))
                    <div class="float-right">
                        <button id="addMember" class="btn btn-success btn-sm">
                            Add Member
                        </button>
                    </div>
                @endif
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Name</th>
            <th colspan="2">E-mail</th>
        </tr>
            @forelse($project->members as $member)
                <tr>
                    <td>{{$member->name}}</td>
                    <td>{{$member->email}}
                        @if(auth()->user()->getRole()->id !== 3)
                            <div class="float-right">
                                <button id="addMember" class="btn btn-danger btn-sm">
                                    Delete Member
                                </button>
                            </div>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">@lang('main.project.no_members')</td>
                </tr>
            @endforelse
    </tbody>
</table>