<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    protected $fillable = ['date', 'Point', 'Id_Course', 'Id_Student'];

    public function student()
    {
        return $this->belongsTo('App\Student', 'Id_Student', 'id');
    }

    public function Course()
    {
        return $this->belongsTo('App\Course', 'Id_Course', 'id');
    }

    public static function search($Id_Course)
    {
        $tests = self::where('Id_Course', $Id_Course)->get();

        if($tests->count() > 0) {
            return $tests;
        } else {
            throw new \Exception(__('No student', ['Id_Course' => $Id_Course]));
        }
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
