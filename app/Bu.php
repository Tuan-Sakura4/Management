<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    protected $table = 'bus';
    public function students(){
        return $this->hasMany('App\Bu');
    }
}
