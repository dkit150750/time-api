<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeRequest;
use App\Http\Resources\TimeResource;
use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function show()
    {
        $time = Time::first();
        return new TimeResource($time);
    }

    public function update(TimeRequest $request)
    {
        Time::first()->update($request->all());
    }
}
