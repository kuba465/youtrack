<table class="table">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                Description
                <div class="float-right">
                    <button class="btn btn-success btn-sm" id="editDescriptionBtn"
                            data-url="{{route('issue.editDescription', ['issue' => $issue])}}" data-toggle="modal" data-target="#editIssueDescriptionForm">
                        Edit description
                    </button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody id="members">
        <tr>
            <td class="w-75" id="issueDescription">{{$issue->description}}</td>
            <th class="w-25">Files</th>
        </tr>
    </tbody>
</table>
@include('modals.editIssueDescription')
