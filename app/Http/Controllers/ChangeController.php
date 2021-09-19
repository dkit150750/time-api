<?php

namespace App\Http\Controllers;

use App\Models\Change;
use Illuminate\Http\Request;

class ChangeController extends Controller
{
    public function update(Request $request, $id): void
    {
        $change = Change::find($id);
        $change->update($request->all());
    }
}
