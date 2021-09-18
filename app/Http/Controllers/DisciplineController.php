<?php

namespace App\Http\Controllers;

use App\Http\Resources\DisciplineResource;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DisciplineController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        if ($request->filled('search')) {
            $cabinet = Discipline::select('id', 'name')->where('name', 'like', "{$request->search}%")->orderBy('name');
        } else {
            $cabinet = Discipline::select('id', 'name')->orderBy('name');
        }
        return DisciplineResource::collection($cabinet);
    }

    public function pagen(Request $request): AnonymousResourceCollection
    {
        if ($request->filled('search')) {
            $cabinet = Discipline::select('id', 'name')->where('name', 'like', "{$request->search}%")->orderBy('name')->paginate(10);
        } else {
            $cabinet = Discipline::select('id', 'name')->orderBy('name')->paginate(10);
        }
        return DisciplineResource::collection($cabinet);
    }


    public function store(Request $request): DisciplineResource
    {
        $cabinet = Discipline::create($request->all());
        return new DisciplineResource($cabinet);
    }

    public function update(Request $request, Discipline $discipline)
    {
        if ($discipline->id > 2) {
            $discipline->update($request->all());
        }
    }

    public function destroy(Discipline $discipline)
    {
        if ($discipline->id > 1) {
            $discipline->delete();
        }
    }
}
