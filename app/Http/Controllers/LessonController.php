<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function update(Request $request, $id): void
    {
        $lesson = Lesson::find($id);
        $lesson->update($request->all());
    }
}
