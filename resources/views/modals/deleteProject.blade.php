<div class="modal fade" tabindex="-1" role="dialog" id="deleteProjectForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('main.project.deleting')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>@lang('main.project.delete_message')</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('main.buttons.close')</button>
                <button type="submit" data-delete="{{route('project.delete', ['project' => $project])}}"
                        id="deleteProject" class="btn btn-danger">@lang('main.project.delete')</button>
            </div>
        </div>
    </div>
</div>