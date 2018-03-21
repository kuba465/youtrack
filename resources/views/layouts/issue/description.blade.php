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
                <div class="files">
                    @forelse($files as $key => $value)
                        <hr>
                        <div class="row" data-file="{{$value['id']}}">
                            @if(in_array($value['extension'], $images))
                                <div class="col-md-9">
                                    <img src="{{$value['url']}}" alt="{{$key}}">
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-danger btn-sm delete-file"
                                            data-delete="{{route('files.delete', ['issue' => $issue, 'file' => $value['id']])}}"
                                            data-message="@lang('main.issue.files.delete_message')">
                                        @lang('main.issue.files.delete')
                                    </button>
                                </div>
                            @else
                                <div class="col-md-9">
                                    <a href="{{$value['url']}}" class="btn btn-info" download>{{$key}}</a>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-danger btn-sm delete-file"
                                            data-delete="{{route('files.delete', ['issue' => $issue, 'file' => $value['id']])}}"
                                            data-message="@lang('main.issue.files.delete_message')">
                                        @lang('main.issue.files.delete')
                                    </button>
                                </div>
                            @endif
                        </div>
                    @empty
                        @lang('main.issue.files.no_files')
                    @endforelse
                </div>
            </th>
        </tr>
    </tbody>
</table>
@include('modals.editIssueDescription')
@include('modals.addFiles')
