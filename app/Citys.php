<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    public function companypartnership() {
    	return $this->hasOne('App\Companypartnership', 'codecompanypartnership');
    }
    public function country() {
    	return $this->belongsTo('App\Countrys', 'codecountry');
    }
}
