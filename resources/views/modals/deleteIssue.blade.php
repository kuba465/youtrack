<div class="modal fade" tabindex="-1" role="dialog" id="deleteIssueForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Issue deleting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete this issue?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{route('issue.delete', ['issue' => $issue])}}" role="button" class="btn btn-danger">Delete issue</a>
            </div>
        </div>
    </div>
</div>