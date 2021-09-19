<?php

namespace App\Http\Resources;

use App\Models\Cabinet;
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
            'disciplineEven' => $this->disciplineEven,
            'disciplineOdd' => $this->disciplineOdd,

            // нечетные кабинты
            'firstOddCabinet' => $this->firstOddCabinet,
            'secondOddCabinet' => $this->secondOddCabinet,
            // четные кабинты
            'firstEvenCabinet' => $this->firstEvenCabinet,
            'secondEvenCabinet' => $this->secondEvenCabinet,

            // нечетные кабинты
            'firstEvenTeacher' => $this->firstEvenTeacher,
            'secondEvenTeacher' => $this->secondEvenTeacher,
            // четные кабинты
            'firstOddTeacher' => $this->firstOddTeacher,
            'secondOddTeacher' => $this->secondOddTeacher,
        ];
    }
}
