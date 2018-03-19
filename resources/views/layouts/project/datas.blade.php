<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                @lang('main.project.details')
                @if(auth()->user()->can('edit.project'))
                    <div class="float-right">
                        <button id="editProjectBtn" data-project="{{$project->id}}" class="btn btn-warning btn-sm"
                                data-toggle="modal" data-target="#editProjectForm">
                                @lang('main.buttons.edit')
                        </button>
                        @if(auth()->user()->can('delete.project'))
                            <button id="deleteProjectBtn" data-project="{{$project->id}}" class="btn btn-danger btn-sm"
                                    data-toggle="modal" data-target="#deleteProjectForm">
                                    @lang('main.buttons.delete')
                            </button>
                        @endif
                    </div>
                @endif
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>@lang('main.project.name')</th>
            <td id="name">{{$project->name}}</td>
        </tr>
        <tr>
            <th>@lang('main.project.manager')</th>
            <td id="manager">{{!empty($projectManager) ? $projectManager->name : ''}}</td>
        </tr>
        <tr>
            <th>@lang('main.global.created_at')</th>
            <td>{{$project->created_at}}</td>
        </tr>
        <tr>
            <th>@lang('main.global.updated_at')</th>
            <td>{{$project->updated_at}}</td>
        </tr>
    </tbody>
</table>
@include('modals.editProject')
@include('modals.deleteProject')