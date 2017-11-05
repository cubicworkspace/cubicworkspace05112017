<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookingspaces extends Model
{
    public function services() {
    	return $this->belongsTo('App\Services', 'codeservices');
    }
    public function companyservices() {
        return $this->belongsTo('App\Companyservices', 'codecompanyservices');
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
    public function paymentmethodes() {
    	return $this->belongsTo('App\Paymentmethodes', 'codepaymentmethode');
    }
}
