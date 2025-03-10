<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       // return parent::toArray($request);
       return[
        "id"=>$this->id,
        "nepali_title"=>$this->nepali_title,
        "english_title"=>$this->english_title,
        "slug"=>$this->slug,
        "posts"=>PostResource::collection($this->posts),
       ];
    }
}
