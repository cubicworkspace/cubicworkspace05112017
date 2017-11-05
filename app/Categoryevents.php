<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoryevents extends Model
{
    public function event() {
    	return $this->hasOne('App\Events', 'codeevent');
    }
}
