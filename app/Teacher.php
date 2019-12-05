<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = ['Name', 'Sex', 'Phone', 'Mail', 'Address'];
}
