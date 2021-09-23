<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChangeResource;
use App\Models\Change;
use Illuminate\Http\Request;

class ChangeController extends Controller
{
    public function update(Request $request, $id): ChangeResource
    {
        $change = Change::find($id);
        $change->update($request->all());
        return new ChangeResource($change);
    }
}
