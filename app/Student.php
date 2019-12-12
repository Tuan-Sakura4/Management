<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['Name','Sex','Image', 'Mail', 'Phone','Address','Birth','Id_Language','Id_Bu'];
    public function language(){
        return $this->belongsTo('App\Language');
    }
    public function tests(){
        return $this->hasMany('App\Test');
    }
}
