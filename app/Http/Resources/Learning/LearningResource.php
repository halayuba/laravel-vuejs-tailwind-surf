<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\Learning\{SourceResource, StatusResource, TypeResource, PriorityResource};

class LearningResource extends JsonResource
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
        'author' => $this->author,
        'url' => $this->url,
        'skills' => $this->skills,
        'note' => $this->note,
        'duration' => $this->duration,
        'published_at' => (string) $this->resourcePublishedAt,
        'created_at' => $this->created_at,
        'source' => new SourceResource($this->whenLoaded('source')),
        'status' => new StatusResource($this->whenLoaded('status')),
        'type' => new TypeResource($this->whenLoaded('type')),
        'priority' => new PriorityResource($this->whenLoaded('priority')),
        'publishedAtAndDuration' => $this->resourcePublishedAtDuration,
      ];
    }
}
