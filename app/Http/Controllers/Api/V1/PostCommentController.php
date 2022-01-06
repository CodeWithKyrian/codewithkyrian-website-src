<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\CommentPosted;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentsRequest;
use App\Http\Resources\Comment as CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    /**
     * Return the post's comments.
     */
    public function index(Request $request, Post $post): ResourceCollection
    {
        $post->load([
            'comments' => function ($query) use ($request) {
                $query->base()->with('author', 'replies')->latest();
            }
        ]);
        // dd($post->comments);
        return CommentResource::collection(
            $post->comments->paginate($request->input('limit', 20))
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentsRequest $request, Post $post): CommentResource
    {
        if (auth()->guard('api')->check()) {
            $comment =  new CommentResource(
                auth()->guard('api')->user()->comments()->create([
                    'post_id' => $post->id,
                    'content' => $request->input('content')
                ])
            );
        } else {
            $comment =  new CommentResource(
                Comment::create([
                    'author_name' => $request->input('author_name'),
                    'post_id' => $post->id,
                    'content' => $request->input('content')
                ])
            );
        }

        // broadcast(new CommentPosted($comment, $post))->toOthers();

        return $comment;
    }

    public function update(Request $request, Post $post, Comment $comment) : CommentResource
    {
        if (auth()->guard('api')->check()) {
            $reply =  new CommentResource(
                $comment->replies()->create([
                    'author_id' => auth()->guard('api')->id(),
                    'post_id' => $post->id,
                    'content' => $request->input('content')
                ])
            );
        } else {
            $reply =  new CommentResource(
                $comment->replies()->create([
                    'author_name' => $request->input('author_name'),
                    'post_id' => $post->id,
                    'content' => $request->input('content')
                ])
            );
        }

        return $reply;
    }
}
