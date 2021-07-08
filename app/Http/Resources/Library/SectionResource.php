<?php

namespace App\Http\Resources\Library;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Library\BookResource;

class SectionResource extends JsonResource
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
        'note' => $this->note,
        'is_important' => $this->is_important,
        'complete_by' => (string) $this->complete_by,
        'completed_on' => (string) $this->completed_on,
        'book_id' => $this->book_id
      ];
    }
}
