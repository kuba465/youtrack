<div class="modal fade" tabindex="-1" role="dialog" id="editProjectForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('main.project.edit')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('project.create')}}" method="post" id="editProject">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">@lang('main.project.form.name')</label>
                        <input type="text" name="name" id="projectName" class="form-control" value="{{$project->name}}"
                               placeholder="@lang('main.project.form.name_placeholder')" required>
                    </div>
                    <div class="form-group">
                        <label for="projectManager">@lang('main.project.form.choose_manager')</label>
                        <select name="projectManager" id="projectManager" class="form-control">
                            <option value="0"> - </option>
                            @foreach($projectManagers as $manager)
                                <option value="{{$manager->id}}" {{!empty($projectManager) && $projectManager->id == $manager->id ? "selected" : ""}}>{{$manager->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('main.buttons.close')</button>
                <button type="submit" id="saveChanges" data-save="{{route('project.edit')}}" class="btn btn-primary">@lang('main.buttons.save')</button>
            </div>
        </div>
    </div>
</div>