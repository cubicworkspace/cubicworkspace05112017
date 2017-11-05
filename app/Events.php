<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public function categoryevent() {
    	return $this->belongsTo('App\Categoryevents', 'codecategoryevent');
    }
}
