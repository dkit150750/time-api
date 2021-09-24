<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id',

        'oddDiscipline_id',
        'evenDiscipline_id',

        'firstOddCabinet_id',
        'secondOddCabinet_id',
        'firstEvenCabinet_id',
        'secondEvenCabinet_id',

        'firstOddTeacher_id',
        'secondOddTeacher_id',
        'firstEvenTeacher_id',
        'secondEvenTeacher_id',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    // дисциплины
    public function oddDiscipline()
    {
        return $this->belongsTo(Discipline::class, 'oddDiscipline_id');
    }

    public function evenDiscipline()
    {
        return $this->belongsTo(Discipline::class, 'evenDiscipline_id');
    }

    // нечетные кабинеты
    public function firstOddCabinet()
    {
        return $this->belongsTo(Cabinet::class, 'firstOddCabinet_id');
    }

    public function secondOddCabinet()
    {
        return $this->belongsTo(Cabinet::class, 'secondOddCabinet_id');
    }

    // четные кабинеты
    public function firstEvenCabinet()
    {
        return $this->belongsTo(Cabinet::class, 'firstEvenCabinet_id');
    }

    public function secondEvenCabinet()
    {
        return $this->belongsTo(Cabinet::class, 'secondEvenCabinet_id');
    }

    // нечетные преподаватели
    public function firstOddTeacher()
    {
        return $this->belongsTo(Teacher::class, 'firstOddTeacher_id');
    }

    public function secondOddTeacher()
    {
        return $this->belongsTo(Teacher::class, 'secondOddTeacher_id');
    }

    // четные преподаватели
    public function firstEvenTeacher()
    {
        return $this->belongsTo(Teacher::class, 'firstEvenTeacher_id');
    }

    public function secondEvenTeacher()
    {
        return $this->belongsTo(Teacher::class, 'secondEvenTeacher_id');
    }
}
