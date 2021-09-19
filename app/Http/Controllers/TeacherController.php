<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TeacherController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $teacher = Teacher::select('id', 'name')->orderBy('name')->get();
        return TeacherResource::collection($teacher);
    }

    public function pagen(Request $request): AnonymousResourceCollection
    {
        if ($request->filled('search')) {
            $teacher = Teacher::select('id', 'name')->where('name', 'like', "{$request->search}%")->orderBy('name')->paginate(10);
        } else {
            $teacher = Teacher::select('id', 'name')->orderBy('name')->paginate(10);
        }
        return TeacherResource::collection($teacher);
    }

    public function store(TeacherRequest $request): TeacherResource
    {
        $teacher = Teacher::create($request->all());
        return new TeacherResource($teacher);
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
