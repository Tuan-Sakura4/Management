<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    protected $fillable = ['Point','Date', 'Id_Student', 'Id_Course'];
    public function student(){
        return $this->belongsTo('App\Student', 'Id_Student', 'id');
    }
    public function course(){
        return $this->belongsTo('App\Course', 'Id_Course', 'id');
    }
}
