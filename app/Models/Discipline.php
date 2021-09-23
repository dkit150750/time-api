<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // уроки
    public function oddLesson()
    {
        return $this->hasMany(Lesson::class, 'oddDiscipline_id');
    }

    public function evenLesson()
    {
        return $this->hasMany(Lesson::class, 'evenDiscipline_id');
    }

    // изменения
    public function oddChange()
    {
        return $this->hasMany(Change::class, 'oddDiscipline_id');
    }

    public function evenChange()
    {
        return $this->hasMany(Change::class, 'evenDiscipline_id');
    }
}
