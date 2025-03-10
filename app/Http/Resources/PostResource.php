<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            "id"=>$this->id,
            "title"=>$this->title,
            "description"=>$this->description,
            'image'=> asset($this->image),
            "meta_words"=>$this->meta_words,
            "meta_description"=>$this->meta_description,
            "views"=>$this->views,
        ];
    }
}
