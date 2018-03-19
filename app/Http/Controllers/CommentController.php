<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Issue;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request, Issue $issue)
    {
        $validatedDatas = $request->validate([
            'description' => 'required|string|min:1'
        ]);

        $comment = Comment::create([
            'description' => $validatedDatas['description'],
            'owner_id' => auth()->user()->id,
            'issue_id' => $issue->id
        ]);

        return response()->json([
            'owner' => $comment->owner->name,
            'description' => $comment->description,
            'updated_at' => $comment->updated_at->format('Y-m-d H:i:s'),
            'editRoute' => route('comment.getText', ['comment' => $comment]),
            'deleteRoute' => route('comment.getDeleteLink', ['comment' => $comment]),
            'commentId' => $comment->id
        ], 200);
    }

    public function edit(Request $request, Comment $comment)
    {
        $validatedDatas = $request->validate([
            'description' => 'required|string|min:1'
        ]);

        $comment->description = $validatedDatas['description'];
        $comment->save();

        return response()->json([
            'description' => $comment->description,
            'updated_at' => $comment->updated_at->format('Y-m-d H:i:s'),
            'commentId' => $comment->id
        ], 200);
    }

    public function getTextOfComment(Comment $comment)
    {
        return response()->json([
            'text' => $comment->description,
            'editRoute' => route('comment.edit', ['comment' => $comment])
        ]);
    }

    public function getDeleteLink(Comment $comment)
    {
        return response()->json([
            'deleteLink' => route('comment.delete', ['comment' => $comment])
        ]);
    }

    public function delete(Comment $comment)
    {
        $commentId = $comment->id;
        $comment->delete();
        return response()->json([
            'commentId' => $commentId
        ]);
    }
}
