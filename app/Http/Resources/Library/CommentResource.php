<?php

namespace App\Http\Resources\Library;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Library\UserResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'body' => $this->body,
        'created_at' => (string) $this->created_at,
        'children' => CommentResource::collection($this->whenLoaded('children')),
        'user' => new UserResource($this->user)
      ];
    }
}
