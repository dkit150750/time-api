<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'course',
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name, '-');
    }

    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function change()
    {
        return $this->hasOne(Change::class);
    }
}
