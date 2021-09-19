<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\Resources\GroupResource;
use App\Models\Change;
use App\Models\Day;
use App\Models\Group;
use App\Models\Lesson;
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
            ->where('slug', $slug)->with(['days.lessons', 'change'])
            ->first();
        return new GroupResource($group);
    }

    public function store(GroupRequest $request): GroupResource
    {
        $group = Group::create($request->all());
        Change::create(['group_id' => $group->id]);

        for ($dayIndex = 1; $dayIndex <= 6; $dayIndex++) {
            $dayName = '';
            if ($dayIndex === 1) {
                $dayName = 'Понедельник';
            } elseif ($dayIndex === 2) {
                $dayName = 'Вторник';
            } elseif ($dayIndex === 3) {
                $dayName = 'Стреда';
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
}
