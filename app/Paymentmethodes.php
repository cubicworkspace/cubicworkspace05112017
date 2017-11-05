<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentmethodes extends Model
{
    public function categorypaymentmethode() {
    	return $this->belongsTo('App\Categorypaymentmethodes', 'codecategorypaymentmethode');
    }
}
