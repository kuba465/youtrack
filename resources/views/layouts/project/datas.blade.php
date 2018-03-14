<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                Project Details
                @if(auth()->user()->can('edit.project'))
                    <div class="float-right">
                        <button id="editProjectBtn" data-project="{{$project->id}}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editProjectForm">
                            Edit
                        </button>
                        @if(auth()->user()->can('delete.project'))
                            <button id="deleteProjectBtn" data-project="{{$project->id}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteProjectForm">
                                Delete
                            </button>
                        @endif
                    </div>
                @endif
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Name</th>
            <td id="name">{{$project->name}}</td>
        </tr>
        <tr>
            <th>Project Manager</th>
            <td id="manager">{{!empty($project->projectManager) ? $project->projectManager->name : ''}}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{$project->created_at}}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{$project->updated_at}}</td>
        </tr>
    </tbody>
</table>
@include('modals.editProject')
@include('modals.deleteProject')