<?php

namespace Event\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->slug,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'start_date_ad' => $this->start_date_ad,
            'end_date' => $this->end_date,
            'end_date_ad' => $this->end_date_ad,
            'creator' => $this->creator->name,
            'image' => $this->image() ? $this->image()->path : null
        ];
    }
}
