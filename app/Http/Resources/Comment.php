<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class Comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        $user = Auth::guard('api')->user();

        return [
            'id' => $this->id,
            'content' => $this->content,
            'humanized_posted_at' => humanize_date($this->created_at),
            'author_id' => $this->author_id,
            'post_id' => $this->post_id,
            'author_name' => $this->author?->name ?? $this->author_name,
            'author_url' => $this->author_id ? route('users.show', $this->author->slug) : '',
            'can_delete' => $user ? $user->id == $this->author_id : false,
            'replies' => Comment::collection($this->replies)
        ];
    }
}
