<?php

namespace App\Http\Resources\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'status' => $this->resource->status,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'original_link' => $this->resource->original_link,
            'short_link' => $this->resource->short_link,
            'image_path' => $this->resource->image_path,
            'domain' => $this->resource->domain->name
        ];
    }
}
