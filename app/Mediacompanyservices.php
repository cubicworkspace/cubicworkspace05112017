<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mediacompanyservices extends Model
{
    public function companyservices() {
    	return $this->belongsTo('App\Companyservices', 'codecompanyservices');
    }
    public function companypartnership() {
    	return $this->belongsTo('App\Companypartnership', 'codecompanypartnership');
    }
}
