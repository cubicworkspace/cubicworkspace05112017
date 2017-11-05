<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminspartnerships extends Model
{
   public function user() {
    	return $this->belongsTo('App\Users', 'codeuser');
    }
    public function companypartnership() {
    	return $this->belongsTo('App\Companypartnership', 'codecompanypartnership');
    }
	
}
