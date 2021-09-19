<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplineRequest;
use App\Http\Resources\DisciplineResource;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DisciplineController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $discipline = Discipline::select('id', 'name')->orderBy('name')->get();
        return DisciplineResource::collection($discipline);
    }

    public function pagen(Request $request): AnonymousResourceCollection
    {
        if ($request->filled('search')) {
            $discipline = Discipline::select('id', 'name')->where('name', 'like', "{$request->search}%")->orderBy('name')->paginate(10);
        } else {
            $discipline = Discipline::select('id', 'name')->orderBy('name')->paginate(10);
        }
        return DisciplineResource::collection($discipline);
    }


    public function store(DisciplineRequest $request): DisciplineResource
    {
        $discipline = Discipline::create($request->all());
        return new DisciplineResource($discipline);
    }

    public function update(DisciplineRequest $request, Discipline $discipline)
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
