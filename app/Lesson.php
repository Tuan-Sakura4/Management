<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = ['Date', 'Id_Teacher', 'Id_Course'];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'Id_Teacher', 'id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'Id_Course', 'id');
    }

    public function attendances()
    {
        return $this->hasMany('App\Attendance', 'Id_Lesson', 'id');
    }

    public function format_date()
    {
        return $this->Date->format('H:i:s d-m-Y');
    }
}
