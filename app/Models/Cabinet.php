<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // нечетные уроки
    public function firstOddLesson()
    {
        return $this->hasMany(Lesson::class, 'firstOddCabinet_id');
    }

    public function secondOddLesson()
    {
        return $this->hasMany(Lesson::class, 'secondOddCabinet_id');
    }

    // четные уроки
    public function firstEvenLesson()
    {
        return $this->hasMany(Lesson::class, 'firstEvenCabinet_id');
    }

    public function secondEvenLesson()
    {
        return $this->hasMany(Lesson::class, 'secondEvenCabinet_id');
    }

    // нечетные изменения
    public function firstOddChange()
    {
        return $this->hasMany(Change::class, 'firstOddCabinet_id');
    }

    public function secondOddChange()
    {
        return $this->hasMany(Change::class, 'secondOddCabinet_id');
    }

    // четные изменения
    public function firstEvenChange()
    {
        return $this->hasMany(Change::class, 'firstEvenCabinet_id');
    }

    public function secondEvenChange()
    {
        return $this->hasMany(Change::class, 'secondEvenCabinet_id');
    }
}
