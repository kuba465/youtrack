<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                @lang('main.issue.description')
                <div class="float-right">
                    <button class="btn btn-success btn-sm" id="editDescriptionBtn"
                            data-url="{{route('issue.editDescription', ['issue' => $issue])}}" data-toggle="modal" data-target="#editIssueDescriptionForm">
                        @lang('main.issue.edit_description')
                    </button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody id="members">
        <tr>
            <td class="w-75" id="issueDescription">{{$issue->description}}</td>
            <th class="w-25" id="issueFiles">
                @lang('main.issue.files.title')
                <div class="float-right">
                    <button class="btn btn-success btn-sm" id="addFilesBtn" data-toggle="modal" data-target="#addFilesForm">
                        @lang('main.issue.files.add')
                    </button>
                </div>
                <div class="files"></div>
            </th>
        </tr>
    </tbody>
</table>
@include('modals.editIssueDescription')
@include('modals.addFiles')
