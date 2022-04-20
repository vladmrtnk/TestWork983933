<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'biography' => $this->biography,
            'email'     => $this->email,
            'books'     => BookResource::collection($this->books)
        ];
    }
}
