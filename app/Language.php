<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = ['Name'];

    public function Students()
    {
        return $this->hasMany('App\Student', 'Id_Language', 'id');
    }
}
