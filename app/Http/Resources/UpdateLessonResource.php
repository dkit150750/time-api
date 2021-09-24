<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdateLessonResource extends JsonResource
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
            'oddDiscipline' => $this->oddDiscipline,
            'evenDiscipline' => $this->evenDiscipline,

            // нечетные кабинты
            'firstOddCabinet' => $this->firstOddCabinet,
            'secondOddCabinet' => $this->secondOddCabinet,
            // четные кабинты
            'firstEvenCabinet' => $this->firstEvenCabinet,
            'secondEvenCabinet' => $this->secondEvenCabinet,

            // нечетные кабинты
            'firstOddTeacher' => $this->firstOddTeacher,
            'secondOddTeacher' => $this->secondOddTeacher,
            // четные кабинты
            'firstEvenTeacher' => $this->firstEvenTeacher,
            'secondEvenTeacher' => $this->secondEvenTeacher,
        ];
    }
}
