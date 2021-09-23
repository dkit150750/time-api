<?php

namespace App\Http\Controllers;

use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function update(Request $request, $id): LessonResource
    {
        $lesson = Lesson::find($id);
        $lesson->update($request->all());
        return new LessonResource($lesson);
    }
}
