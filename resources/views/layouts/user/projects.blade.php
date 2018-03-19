<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                @lang('main.project.project_plural')
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>@lang('main.project.name')</th>
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