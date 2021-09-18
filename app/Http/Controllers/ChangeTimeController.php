<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeRequest;
use App\Http\Resources\TimeResource;
use App\Models\ChangeTime;

class ChangeTimeController extends Controller
{
    public function show(): TimeResource
    {
        $time = ChangeTime::first();
        return new TimeResource($time);
    }

    public function update(TimeRequest $request): void
    {
        ChangeTime::first()->update($request->all());
    }
}
