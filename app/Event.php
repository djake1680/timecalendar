<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function employee() {
        return $this->belongsTo('App\Album');
    }
}
