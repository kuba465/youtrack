<div class="modal fade" tabindex="-1" role="dialog" id="createIssueFromProjectForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new issue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createIssueFromProjectModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="saveIssueFromProject" data-save="{{route('issue.create')}}" class="btn btn-primary">Add issue</button>
            </div>
        </div>
    </div>
</div>