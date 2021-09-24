<?php

namespace App\Http\Controllers;

use App\Http\Resources\UpdateLessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function update(Request $request, $id): UpdateLessonResource
    {
        $lesson = Lesson::find($id);
        $lesson->update($request->all());
        return new UpdateLessonResource($lesson);
    }
}
