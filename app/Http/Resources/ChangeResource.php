<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChangeResource extends JsonResource
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
            'oddDiscipline' => new DisciplineResource($this->whenLoaded('oddDiscipline')),
            'evenDiscipline' => new DisciplineResource($this->whenLoaded('evenDiscipline')),

            // нечетные кабинты
            'firstOddCabinet' => new CabinetResource($this->whenLoaded('firstOddCabinet')),
            'secondOddCabinet' => new CabinetResource($this->whenLoaded('secondOddCabinet')),
            // четные кабинты
            'firstEvenCabinet' => new CabinetResource($this->whenLoaded('firstEvenCabinet')),
            'secondEvenCabinet' => new CabinetResource($this->whenLoaded('secondEvenCabinet')),

            // нечетные кабинты
            'firstOddTeacher' => new TeacherResource($this->whenLoaded('firstOddTeacher')),
            'secondOddTeacher' => new TeacherResource($this->whenLoaded('secondOddTeacher')),
            // четные кабинты
            'firstEvenTeacher' => new TeacherResource($this->whenLoaded('firstEvenTeacher')),
            'secondEvenTeacher' => new TeacherResource($this->whenLoaded('secondEvenTeacher')),
        ];
    }
}
