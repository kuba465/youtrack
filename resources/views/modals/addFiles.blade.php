<div class="modal fade" tabindex="-1" role="dialog" id="addFilesForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('main.issue.files.add')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="addMemberModalBody">
                <form action="#" method="post" id="addFilesToIssue">
                    {{csrf_field()}}
                    <div class="form-group" id="filesDivForm">
                        <label for="title">@lang('main.issue.files.form_title')</label>
                        <input type="file" name="files[]" id="files" class="form-control" multiple required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('main.buttons.close')</button>
                <button type="submit" id="addFiles" class="btn btn-primary"
                        data-save="{{route('files.save', ['issue' => $issue->id])}}">
                    @lang('main.issue.files.add')
                </button>
            </div>
        </div>
    </div>
</div>