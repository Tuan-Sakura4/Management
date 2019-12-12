<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    protected $table = 'bus';

    protected $fillable = ['Name'];

    public function Students()
    {
        return $this->hasMany('App\Student', 'Id_Bu', 'id');
    }
}
