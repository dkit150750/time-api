<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'id' => $this->id,
            // дисциплины
            'oddDiscipline' => $this->whenLoaded('oddDiscipline'),
            'evenDiscipline' => $this->whenLoaded('evenDiscipline'),

            // нечетные кабинты
            'firstOddCabinet' => $this->whenLoaded('firstOddCabinet'),
            'secondOddCabinet' => $this->whenLoaded('secondOddCabinet'),
            // четные кабинты
            'firstEvenCabinet' => $this->whenLoaded('firstEvenCabinet'),
            'secondEvenCabinet' => $this->whenLoaded('secondEvenCabinet'),

            // нечетные кабинты
            'firstOddTeacher' => $this->whenLoaded('firstOddTeacher'),
            'secondOddTeacher' => $this->whenLoaded('secondOddTeacher'),
            // четные кабинты
            'firstEvenTeacher' => $this->whenLoaded('firstEvenTeacher'),
            'secondEvenTeacher' => $this->whenLoaded('secondEvenTeacher'),
        ];
    }
}
