<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $fillable = ['Id_Lesson', 'Id_Student', 'created_at', 'updated_at'];

    public function student()
    {
        return $this->belongsTo('App\Student', 'Id_Student', 'id');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Lesson', 'Id_Lesson', 'id');
    }
}
