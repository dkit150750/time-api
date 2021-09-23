<?php

namespace App\Http\Controllers;

use App\Http\Resources\DateResource;
use App\Models\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function show(): DateResource
    {
        $date = Date::select('id', 'name')->first();
        return new DateResource($date);
    }

    public function update(Request $request): DateResource
    {
        $date = Date::first();
        $date->update($request->all());
        return new DateResource($date);
    }
}
