<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Http\Resources\GroupResource;
use App\Models\Change;
use App\Models\Day;
use App\Models\Group;
use App\Models\Lesson;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GroupController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return GroupResource::collection(Group::all());
    }

    public function show($slug): GroupResource
    {
        $group = Group::select(['id', 'name', 'course', 'slug'])
            ->where('slug', $slug)->with([
                'days.lessons.oddDiscipline:id,name',
                'days.lessons.evenDiscipline:id,name',
                'days.lessons.firstOddCabinet:id,name',
                'days.lessons.secondOddCabinet:id,name',
                'days.lessons.firstEvenCabinet:id,name',
                'days.lessons.secondEvenCabinet:id,name',
                'days.lessons.firstOddTeacher:id,name',
                'days.lessons.secondOddTeacher:id,name',
                'days.lessons.firstEvenTeacher:id,name',
                'days.lessons.secondEvenTeacher:id,name',
                'changes.oddDiscipline:id,name',
                'changes.evenDiscipline:id,name',
                'changes.firstOddCabinet:id,name',
                'changes.secondOddCabinet:id,name',
                'changes.firstEvenCabinet:id,name',
                'changes.secondEvenCabinet:id,name',
                'changes.firstOddTeacher:id,name',
                'changes.secondOddTeacher:id,name',
                'changes.firstEvenTeacher:id,name',
                'changes.secondEvenTeacher:id,name',
            ])
            ->first();
        return new GroupResource($group);
    }

    public function store(GroupRequest $request): GroupResource
    {
        $group = Group::create($request->all());
        Change::create(['group_id' => $group->id]);
        Change::create(['group_id' => $group->id]);
        Change::create(['group_id' => $group->id]);
        Change::create(['group_id' => $group->id]);
        Change::create(['group_id' => $group->id]);

        for ($dayIndex = 1; $dayIndex <= 6; $dayIndex++) {
            $dayName = '';
            if ($dayIndex === 1) {
                $dayName = 'Понедельник';
            } elseif ($dayIndex === 2) {
                $dayName = 'Вторник';
            } elseif ($dayIndex === 3) {
                $dayName = 'Среда';
            } elseif ($dayIndex === 4) {
                $dayName = 'Четверг';
            } elseif ($dayIndex === 5) {
                $dayName = 'Пятница';
            } elseif ($dayIndex === 6) {
                $dayName = 'Суббота';
            }

            $day = Day::create(['name' => $dayName, 'group_id' => $group->id]);

            for ($lessonIndex = 1; $lessonIndex <= 5; $lessonIndex++) {
                Lesson::create(['day_id' => $day->id]);
            }
        }
        return new GroupResource($group);
    }

    public function update(GroupUpdateRequest $request, $slug): GroupResource
    {
        $group = Group::where('slug', $slug)->first();
        $group->update($request->all());
        return new GroupResource($group);
    }

    public function destroy($slug): JsonResponse
    {
        $group = Group::where('slug', $slug)->first();
        $group->delete();
        return response()->json(['id' => $group->id]);
    }

    public function courseGroups($course): AnonymousResourceCollection
    {
        return GroupResource::collection(Group::where('course', $course)->get());
    }

    public function fresh(Request $request): JsonResponse
    {
        $groups = Group::all();
        foreach ($groups as $group) {
            $changes = $group->changes;

            $day = $group->days()->where('name', $request->day)->first();
            $lessons = $day->lessons;

            for ($i = 0; $i < 5; ++$i) {
                $lesson = $lessons[$i];
                $data = [
                    'oddDiscipline_id' => $lesson->oddDiscipline_id,
                    'evenDiscipline_id' => $lesson->evenDiscipline_id,

                    'firstOddCabinet_id' => $lesson->firstOddCabinet_id,
                    'secondOddCabinet_id' => $lesson->secondOddCabinet_id,
                    'firstEvenCabinet_id' => $lesson->firstEvenCabinet_id,
                    'secondEvenCabinet_id' => $lesson->secondEvenCabinet_id,

                    'firstOddTeacher_id' => $lesson->firstOddTeacher_id,
                    'secondOddTeacher_id' => $lesson->secondOddTeacher_id,
                    'firstEvenTeacher_id' => $lesson->firstEvenTeacher_id,
                    'secondEvenTeacher_id' => $lesson->secondEvenTeacher_id,
                ];
                $changes[$i]->update($data);
            }
        }
        return response()->json(['message' => 'success']);
    }
}
