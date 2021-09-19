<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    // дисциплины
    public function disciplineEven()
    {
        return $this->belongsTo(Discipline::class, 'disciplineEven_id');
    }

    public function disciplineOdd()
    {
        return $this->belongsTo(Discipline::class, 'disciplineOdd_id');
    }

    // нечетные кабинеты
    public function firstOddCabinet()
    {
        return $this->belongsTo(Teacher::class, 'firstOddCabinet_id');
    }

    public function secondOddCabinet()
    {
        return $this->belongsTo(Teacher::class, 'secondOddCabinet_id');
    }

    // четные кабинеты
    public function firstEvenCabinet()
    {
        return $this->belongsTo(Teacher::class, 'firstEvenCabinet_id');
    }

    public function secondEvenCabinet()
    {
        return $this->belongsTo(Teacher::class, 'secondEvenCabinet_id');
    }

    // нечетные преподаватели
    public function firstEvenTeacher()
    {
        return $this->belongsTo(Teacher::class, 'firstEvenTeacher_id');
    }

    public function secondEvenTeacher()
    {
        return $this->belongsTo(Teacher::class, 'secondEvenTeacher_id');
    }

    // четные преподаватели
    public function firstOddTeacher()
    {
        return $this->belongsTo(Teacher::class, 'firstOddTeacher_id');
    }

    public function secondOddTeacher()
    {
        return $this->belongsTo(Teacher::class, 'secondOddTeacher_id');
    }
}
