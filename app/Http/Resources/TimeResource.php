<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'first' => $this->first,
            'second' => $this->second,
            'third' => $this->third,
            'fourth' => $this->fourth,
            'fifth' => $this->fifth,
        ];
    }
}
