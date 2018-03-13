<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                Project Details
                @if(auth()->user()->getRole()->id !== 3)
                    <div class="float-right">
                        <button id="editUserBtn" class="btn btn-warning btn-sm">
                            Edit
                        </button>
                        <button id="deleteUserBtn" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </div>
                @endif
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Name</th>
            <td>{{$project->name}}</td>
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