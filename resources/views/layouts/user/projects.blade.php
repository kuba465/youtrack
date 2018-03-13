<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                My Projects
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Name</th>
        </tr>
            @forelse($user->projects as $project)
                <tr>
                    <td>{{$project->name}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">@lang('main.user.no_projects')</td>
                </tr>
            @endforelse
    </tbody>
</table>