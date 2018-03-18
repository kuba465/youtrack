<div class="modal fade" tabindex="-1" role="dialog" id="editIssueDescriptionForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit issue's description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="description">Description of issue</label>
                    <textarea name="description" class="form-control" placeholder="Enter description">{{$issue->description}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="saveIssueDescription"
                        data-save="{{route('issue.editDescription', ['issue' => $issue])}}"
                        class="btn btn-primary">Edit description
                </button>
            </div>
        </div>
    </div>
</div>