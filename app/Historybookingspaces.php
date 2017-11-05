<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historybookingspaces extends Model
{
     public function services() {
    	return $this->belongsTo('App\Services', 'codeservices');
    }
     public function companypartnership() {
    	return $this->belongsTo('App\Companypartnership', 'codecompanypartnership');
    }
    public function billingcompanyservices() {
    	return $this->belongsTo('App\Billingcompanyservices', 'codebilling');
    }
    public function user() {
    	return $this->belongsTo('App\Users', 'codeuser');
    }
}
