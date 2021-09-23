<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeRequest;
use App\Http\Resources\TimeResource;
use App\Models\Time;

class TimeController extends Controller
{
    public function show(): TimeResource
    {
        $time = Time::select('first', 'second', 'third', 'fourth', 'fifth')->first();
        return new TimeResource($time);
    }

    public function update(TimeRequest $request)
    {
        $time = Time::first();
        $time->update($request->all());
        return new TimeResource($time);
    }
}
