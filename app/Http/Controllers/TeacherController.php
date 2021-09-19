<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TeacherController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        if ($request->filled('search')) {
            $cabinet = Teacher::select('id', 'name')->where('name', 'like', "{$request->search}%")->orderBy('name');
        } else {
            $cabinet = Teacher::select('id', 'name')->orderBy('name');
        }
        return TeacherResource::collection($cabinet);
    }

    public function pagen(Request $request): AnonymousResourceCollection
    {
        if ($request->filled('search')) {
            $cabinet = Teacher::select('id', 'name')->where('name', 'like', "{$request->search}%")->orderBy('name')->paginate(10);
        } else {
            $cabinet = Teacher::select('id', 'name')->orderBy('name')->paginate(10);
        }
        return TeacherResource::collection($cabinet);
    }

    public function store(TeacherRequest $request): TeacherResource
    {
        $cabinet = Teacher::create($request->all());
        return new TeacherResource($cabinet);
    }

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        if ($teacher->id !== 1) {
            $teacher->update($request->all());
        }
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->id !== 1) {
            $teacher->delete();
        }
    }
}
