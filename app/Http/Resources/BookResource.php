<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'offer_name' => $this->offer->name,
            'price' => $this->offer->price,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'date' => $this->date,
            'photo' => $this->offer->image,
            'description' => $this->offer->description,
        ];
    }

}
