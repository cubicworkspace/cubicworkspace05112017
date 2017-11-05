<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookingtour extends Model
{
    public function companyservices() {
    	return $this->belongsTo('App\Companyservices', 'codecompanyservices');
    }
    public function companypartnership() {
    	return $this->belongsTo('App\Companypartnership', 'codecompanypartnership');
    }
}
