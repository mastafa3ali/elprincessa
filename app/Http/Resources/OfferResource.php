<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'min_price' => $this->min_price,
            'befor_discount' => $this->befor_discount,
            // 'user'=>new UserResource($this->user()->first()),
            'photo' => $this->image,
            'short_description' => $this->short_description,
            'description' => $this->description,


        ];
    }

}
