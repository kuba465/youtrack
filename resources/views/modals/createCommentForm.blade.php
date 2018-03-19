<div class="modal fade" tabindex="-1" role="dialog" id="createCommentForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('main.comment.create')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="comment">@lang('main.comment.text')</label>
                <textarea name="comment" class="form-control" placeholder="@lang('main.comment.text_placeholder')" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('main.buttons.close')</button>
                <button type="submit" id="createComment" data-save="{{route('comment.create', ['issue' => $issue])}}"
                        class="btn btn-primary">
                    @lang('main.comment.create')
                </button>
            </div>
        </div>
    </div>
</div>