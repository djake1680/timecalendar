<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function events()
    {
        return $this->hasMany('App\Event');

        // BELOW CODE finds 1 event with employee_id of 12345
        //$events = Employee::find(1)->events()->where("employee_id", "12345");
        //dd($events);
    }
}
