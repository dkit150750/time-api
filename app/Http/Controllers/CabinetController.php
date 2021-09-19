<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabinetRequest;
use App\Http\Resources\CabinetResource;
use App\Models\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CabinetController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $cabinet = Cabinet::select('id', 'name')->orderBy('name')->get();
        return CabinetResource::collection($cabinet);
    }

    public function pagen(Request $request): AnonymousResourceCollection
    {
        if ($request->filled('search')) {
            $cabinet = Cabinet::select('id', 'name')->where('name', 'like', "{$request->search}%")->orderBy('name')->paginate(10);
        } else {
            $cabinet = Cabinet::select('id', 'name')->orderBy('name')->paginate(10);
        }
        return CabinetResource::collection($cabinet);
    }

    public function store(CabinetRequest $request): CabinetResource
    {
        $cabinet = Cabinet::create($request->all());
        return new CabinetResource($cabinet);
    }

    public function update(CabinetRequest $request, Cabinet $cabinet): void
    {
        if ($cabinet->id !== 1) {
            $cabinet->update($request->all());
        }
    }

    public function destroy(Cabinet $cabinet): void
    {
        if ($cabinet->id !== 1) {
            $cabinet->delete();
        }
    }
}
