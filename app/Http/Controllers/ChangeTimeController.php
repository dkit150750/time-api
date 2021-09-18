<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeRequest;
use App\Http\Resources\TimeResource;
use App\Models\ChangeTime;

class ChangeTimeController extends Controller
{
    public function show()
    {
        $time = ChangeTime::first();
        return new TimeResource($time);
    }

    public function update(TimeRequest $request)
    {
        ChangeTime::first()->update($request->all());
    }
}
