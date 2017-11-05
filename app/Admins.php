<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
	
	public function user() {
    	return $this->belongsTo('App\Users', 'codeuser');
    }
	public function categoryadmin() {
    	return $this->belongsTo('App\CategoryAdmins', 'codecategoryadmin');
    }
  
}
