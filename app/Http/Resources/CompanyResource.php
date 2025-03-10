<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
        "company_name"=>$this->company_name,
        "phone"=>$this->phone,
        "email"=>$this->email,
        "logo"=> asset($this->logo),
        "facebook"=>$this->facebook,
        "instagram"=>$this->instagram,
        "tel"=>$this->tel,
        "slug"=>$this->slug,
        "address"=>$this->address,
       ];
    }
}
