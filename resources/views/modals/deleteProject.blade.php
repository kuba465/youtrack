<div class="modal fade" tabindex="-1" role="dialog" id="deleteProjectForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Project deleting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete this project?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{route('project.delete', ['project' => $project])}}" me role="button" class="btn btn-primary">Delete project</a>
            </div>
        </div>
    </div>
</div>