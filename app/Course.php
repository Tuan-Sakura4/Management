<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = ['Name', 'Content', 'Description'];


    public function lessons()
    {
        return $this->hasMany('App\Lesson', 'Id_Course', 'id');
    }

    public function tests()
    {
        return $this->hasMany('App\Test', 'Id_Course', 'id');
    }
}
