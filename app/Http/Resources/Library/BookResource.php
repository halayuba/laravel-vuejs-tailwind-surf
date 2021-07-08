<?php

namespace App\Http\Resources\Library;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Library\SubjectResource;

class BookResource extends JsonResource
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
            'title' => $this->title,
            'file' => $this->image,
            'uuid' => $this->uuid,
            'author' => $this->author,
            'publish_date' => $this->publish_date,
            'pages' => $this->pages,
            'priority' => $this->priority,
            'rating' => $this->rating,
            'url' => $this->url,
            'subjects' => SubjectResource::collection($this->subjects)
        ];
    }
}
