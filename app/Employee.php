<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'employee_id';

    public function events()
    {
        return $this->hasMany('App\Event', 'employee_id', 'employee_id');
    }
}
