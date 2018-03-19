<div class="modal fade" tabindex="-1" role="dialog" id="createIssueForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('main.issue.create')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createIssueModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('main.buttons.close')</button>
                <button type="submit" id="saveIssue" data-save="{{route('issue.create')}}" class="btn btn-primary" disabled>@lang('main.issue.create')</button>
            </div>
        </div>
    </div>
</div>