<div class="modal fade" tabindex="-1" role="dialog" id="editIssueDescriptionForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('main.issue.edit_description')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="description">@lang('main.issue.form.description')</label>
                    <textarea name="description" class="form-control"
                              placeholder="@lang('main.issue.form.description_placeholder')">{{$issue->description}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('main.buttons.close')</button>
                <button type="submit" id="saveIssueDescription"
                        data-save="{{route('issue.editDescription', ['issue' => $issue])}}"
                        class="btn btn-primary">@lang('main.buttons.save')
                </button>
            </div>
        </div>
    </div>
</div>