<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function changes()
    {
        return $this->belongsToMany(Change::class);
    }
}
