<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagcompanyservices extends Model
{
    public function companyservices()
    {
        return $this->belongsToMany('App\Companyservices', 'tagcompanyservices', 'codecompanyservices', 'codetagservices');
    }
    public function comservices() {
    	return $this->belongsTo('App\Companyservices', 'codecompanyservices');
    }
   
}
