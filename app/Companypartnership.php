<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companypartnership extends Model
{
    public function adminspartnership() {
   		return $this->belongsTo(Adminspartnerships::class);
	}
	
    public function city() {
    	return $this->belongsTo('App\Citys', 'codecity');
    }
    public function country() {
    	return $this->belongsTo('App\Countrys', 'codecountry');
    }
    public function tagservices() {
        return $this->belongsTo('App\Tagservices', 'codetagservices');
    }
}