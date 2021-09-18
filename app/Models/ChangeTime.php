<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'first',
        'second',
        'third',
        'fourth',
        'fifth',
    ];
}
