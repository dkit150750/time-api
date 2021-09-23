<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // нечетные уроки
    public function firstOddLesson()
    {
        return $this->hasMany(Lesson::class, 'firstOddTeacher_id');
    }

    public function secondOddLesson()
    {
        return $this->hasMany(Lesson::class, 'secondOddTeacher_id');
    }

    // четные уроки
    public function firstEvenLesson()
    {
        return $this->hasMany(Lesson::class, 'firstEvenTeacher_id');
    }

    public function secondEvenLesson()
    {
        return $this->hasMany(Lesson::class, 'secondEvenTeacher_id');
    }

    // нечетные изменения
    public function firstOddChange()
    {
        return $this->hasMany(Change::class, 'firstOddTeacher_id');
    }

    public function secondOddChange()
    {
        return $this->hasMany(Change::class, 'secondOddTeacher_id');
    }

    // четные изменения
    public function firstEvenChange()
    {
        return $this->hasMany(Change::class, 'firstEvenTeacher_id');
    }

    public function secondEvenChange()
    {
        return $this->hasMany(Change::class, 'secondEvenTeacher_id');
    }
}
