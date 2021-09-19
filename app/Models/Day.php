<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'group_id',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
