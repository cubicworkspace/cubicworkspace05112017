<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historybillingcompanyservices extends Model
{
    public function companypartnership() {
    	return $this->belongsTo('App\Companypartnership', 'codecompanypartnership');
    }
   	public function companyservices() {
    	return $this->belongsTo('App\Companyservices', 'codecompanyservices');
    }
}
