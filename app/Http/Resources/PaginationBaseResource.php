<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class PaginationBaseResource extends ResourceCollection
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this->resource);
        return [
            'data' => $this->resource->items(),
            'meta' => [
                'links' => [
                    'first' => $this->resource->url(1),
                    'last' => $this->resource->url($this->resource->lastPage()),
                    'previous' => $this->resource->previousPageUrl(),
                    'next' => $this->resource->nextPageUrl(),
                ]
            ]
        ];
    }
}

