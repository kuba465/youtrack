<div class="modal fade" tabindex="-1" role="dialog" id="deleteIssueForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('main.issue.deleting')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>@lang('main.issue.delete_message')</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('main.buttons.close')</button>
                <button type="submit" data-delete="{{route('issue.delete', ['issue' => $issue])}}"
                        id="deleteIssue" class="btn btn-danger">@lang('main.issue.delete')</button>
            </div>
        </div>
    </div>
</div>