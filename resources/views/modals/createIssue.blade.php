<div class="modal fade" tabindex="-1" role="dialog" id="createIssueForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new issue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('issue.create')}}" method="post" id="createIssue">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Title of issue</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name of project" required>
                    </div>
                    <div class="form-group">
                        <label for="projectManager">Choose project manager</label>
                        <select name="projectManager" class="form-control">
                            <option value="0"> - </option>
                            @foreach($projectManagers as $manager)
                                <option value="{{$manager->id}}">{{$manager->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="createIssue" id="saveIssue" class="btn btn-primary">Add issue</button>
            </div>
        </div>
    </div>
</div>