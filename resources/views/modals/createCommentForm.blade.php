<div class="modal fade" tabindex="-1" role="dialog" id="createCommentForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="comment">Comment text</label>
                <textarea name="comment" class="form-control" placeholder="Enter comment" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="createComment" data-save="{{route('comment.create', ['issue' => $issue])}}"
                        class="btn btn-primary">
                    Save Comment
                </button>
            </div>
        </div>
    </div>
</div>