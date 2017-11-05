<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countrys extends Model
{
    public function companypartnership() {
    	return $this->hasOne('App\Companypartnership', 'codecompanypartnership');
    }
}
