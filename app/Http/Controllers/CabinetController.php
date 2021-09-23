<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabinetRequest;
use App\Http\Resources\CabinetResource;
use App\Models\Cabinet;
use App\Models\Change;
use App\Models\Lesson;
use Illuminate\Http\JsonResponse;
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

    public function update(CabinetRequest $request, Cabinet $cabinet)
    {
        if ($cabinet->id <= 2) {
            return response()->json(['message' => 'Нельзя изменить', 'id' => $cabinet->id], 405)->header('Allow', 'GET');
        }

        $cabinet->update($request->all());
        return new CabinetResource($cabinet);
    }

    public function destroy(Cabinet $cabinet): JsonResponse
    {
        $id = $cabinet->id;
        if (
            Lesson::where('firstOddCabinet_id', $id)->orWhere([
                'secondOddCabinet_id' => $id,
                'firstEvenCabinet_id' => $id,
                'secondEvenCabinet_id' => $id,
            ])->first()
            || Change::where('firstOddCabinet_id', $id)->orWhere([
                'secondOddCabinet_id' => $id,
                'firstEvenCabinet_id' => $id,
                'secondEvenCabinet_id' => $id,
            ])->first()
        ) {
            return response()->json(['message' => 'Используется', 'id' => $id], 405)->header('Allow', 'GET');
        }

        if ($id <= 2) {
            return response()->json(['message' => 'Нельзя удалить', 'id' => $id], 405)->header('Allow', 'GET');
        }

        $cabinet->delete();
        return response()->json(['id' => $id]);
    }
}
