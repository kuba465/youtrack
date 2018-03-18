<div class="modal fade" tabindex="-1" role="dialog" id="editIssueForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit issue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="editIssueModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="saveIssueChanges" data-save="{{route('issue.edit', ['issue' => $issue])}}" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>