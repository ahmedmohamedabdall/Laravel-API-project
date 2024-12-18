<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request){
                return [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'slug' => $this->slug
        ];
    }
}
