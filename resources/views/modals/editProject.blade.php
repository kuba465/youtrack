<div class="modal fade" tabindex="-1" role="dialog" id="editProjectForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('project.create')}}" method="post" id="editProject">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name of project</label>
                        <input type="text" name="name" id="projectName" class="form-control" value="{{$project->name}}" placeholder="Enter name of project" required>
                    </div>
                    <div class="form-group">
                        <label for="projectManager">Choose project manager</label>
                        <select name="projectManager" id="projectManager" class="form-control">
                            <option value="0"> - </option>
                            @foreach($projectManagers as $manager)
                                <option value="{{$manager->id}}" {{!empty($projectManager) && $projectManager->id == $manager->id ? "selected" : ""}}>{{$manager->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="saveChanges" data-save="{{route('project.edit')}}" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>