<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeRequest;
use App\Http\Resources\TimeResource;
use App\Models\ChangeTime;

class ChangeTimeController extends Controller
{
    public function show(): TimeResource
    {
        $time = ChangeTime::select('first', 'second', 'third', 'fourth', 'fifth')->first();
        return new TimeResource($time);
    }

    public function update(TimeRequest $request): TimeResource
    {
        $time = ChangeTime::first();
        $time->update($request->all());
        return new TimeResource($time);
    }
}
