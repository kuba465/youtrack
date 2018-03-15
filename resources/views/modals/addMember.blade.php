<div class="modal fade" tabindex="-1" role="dialog" id="addMemberForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="addMemberModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="addMember" data-save="{{route('project.addMember', ['project' => $project->id])}}" class="btn btn-primary">
                    Add member
                </button>
            </div>
        </div>
    </div>
</div>