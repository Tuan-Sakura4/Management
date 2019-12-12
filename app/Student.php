<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['Name', 'Sex', 'Phone', 'Mail', 'Address', 'Image', 'Birth', 'Id_Language', 'Id_Bu'];

    public function attendances()
    {
        return $this->hasMany('App\Attendance', 'Id_Student', 'id');
    }

    public function bu()
    {
        return $this->belongsTo('App\Bu', 'Id_Bu', 'id');
    }

    public function Language()
    {
        return $this->belongsTo('App\Language', 'Id_Language', 'id');
    }

    public function tests()
    {
        return $this->hasMany('App\Test', 'Id_Student', 'id');
    }

    public static function searchBu($Id_Bu)
    {
        $student = self::where('Id_bu', $Id_Bu)->get();

        if($student->count() > 0) {
            return $student;
        } else {
            throw new \Exception(__('No student', ['Id_Bu' => $Id_Bu]));
        }
    }

    public static function searchLanguage($Id_Language)
    {
        $student = self::where('Id_Language', $Id_Language)->get();

        if($student->count() > 0) {
            return $student;
        } else {
            throw new \Exception(__('No student', ['Id_Language' => $Id_Language]));
        }
    }
}
