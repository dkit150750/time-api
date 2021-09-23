<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplineRequest;
use App\Http\Resources\DisciplineResource;
use App\Models\Change;
use App\Models\Discipline;
use App\Models\Lesson;
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
        if ($discipline->id <= 2) {
            return response()->json(['message' => 'Нельзя изменить', 'id' => $discipline->id], 405)->header('Allow', 'GET');
        }

        $discipline->update($request->all());
        return new DisciplineResource($discipline);
    }

    public function destroy(Discipline $discipline)
    {
        $id = $discipline->id;
        if (
            Lesson::where('oddDiscipline_id', $id)->orWhere([
                'evenDiscipline_id' => $id,
            ])->first()
            || Change::where('oddDiscipline_id', $id)->orWhere([
                'evenDiscipline_id' => $id,
            ])->first()
        ) {
            return response()->json(['message' => 'Используется', 'id' => $id], 405)->header('Allow', 'GET');
        }

        if ($id <= 2) {
            return response()->json(['message' => 'Нельзя удалить', 'id' => $id], 405)->header('Allow', 'GET');
        }

        $discipline->delete();
        return response()->json(['id' => $discipline->id]);
    }
}
