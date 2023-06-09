<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'file'=> $this->gallery_image(),
            'uploaded_by' => $this->user->name,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
