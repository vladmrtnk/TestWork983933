<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'genre'       => $this->genre,
            'publishers'  => PublisherResource::collection($this->whenLoaded('publishers'))
        ];
    }
}
