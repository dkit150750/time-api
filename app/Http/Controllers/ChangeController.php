<?php

namespace App\Http\Controllers;

use App\Http\Resources\UpdateChangeResource;
use App\Models\Change;
use Illuminate\Http\Request;

class ChangeController extends Controller
{
    public function update(Request $request, $id): UpdateChangeResource
    {
        $change = Change::find($id);
        $change->update($request->all());
        return new UpdateChangeResource($change);
    }
}
