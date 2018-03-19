<table class="table">
    <thead>
        <tr>
            <th colspan="4" class="text-center">
                @lang('main.comment.title')
                <div class="float-right">
                    <button id="createCommentBtn" class="btn btn-success btn-sm" data-toggle="modal" data-target="#createCommentForm">
                        @lang('main.comment.add')
                    </button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody id="comments">
        <tr>
            <th class="w-25">@lang('main.comment.author')</th>
            <th class="w-75">@lang('main.comment.description')</th>
            <th class="w-25">@lang('main.global.updated_at')</th>
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
                                @lang('main.buttons.edit')
                            </button>
                            <button data-url="{{route('comment.getDeleteLink', ['comment' => $comment])}}" class="btn btn-danger btn-sm"
                                    data-toggle="modal" data-target="#deleteCommentForm" onclick="deleteCommentLink($(this))">
                                @lang('main.buttons.delete')
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