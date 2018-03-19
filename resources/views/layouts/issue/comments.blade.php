<table class="table">
    <thead>
        <tr>
            <th colspan="4" class="text-center">
                Comments
                <div class="float-right">
                    <button id="createCommentBtn" class="btn btn-success btn-sm" data-toggle="modal" data-target="#createCommentForm">
                        Add comment
                    </button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody id="comments">
        <tr>
            <th class="w-25">Author</th>
            <th class="w-75">Description</th>
            <th class="w-25">Updated at</th>
        </tr>
        @forelse($issue->comments as $comment)
            <tr data-comment="{{$comment->id}}">
                <td>{{$comment->owner->name}}</td>
                <td class="description">{{$comment->description}}</td>
                <td class="updated_at">{{$comment->updated_at->format('Y-m-d H:i:s')}}</td>
                <td>
                    @if($comment->owner->id == auth()->user()->id)
                        <div class="float-right">
                            <button data-url="{{route('comment.getText', ['comment' => $comment])}}" class="btn btn-warning btn-sm"
                                    data-toggle="modal" data-target="#editCommentForm" onclick="textOfComment($(this))">
                                Edit
                            </button>
                            <button data-url="{{route('comment.getDeleteLink', ['comment' => $comment])}}" class="btn btn-danger btn-sm"
                                    data-toggle="modal" data-target="#deleteCommentForm" onclick="deleteCommentLink($(this))">
                                Delete
                            </button>
                        </div>
                    @endif
                </td>
            </tr>
        @empty
            <tr id="no_comments">
                <td colspan="4">@lang('main.comment.no_comments')</td>
            </tr>
        @endforelse
    </tbody>
</table>
@include('modals.createCommentForm')
@include('modals.editCommentForm')
@include('modals.deleteCommentForm')