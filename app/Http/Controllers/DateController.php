<?php

namespace App\Http\Controllers;

use App\Http\Resources\DateResource;
use App\Models\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function show(): DateResource
    {
        $day = Date::first();
        return new DateResource($day);
    }

    public function update(Request $request)
    {
        $date = Date::first();
        $date->update($request->all());
    }
}
