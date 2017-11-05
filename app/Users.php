<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
 {
   	protected $table = 'users';
    protected $primary = 'codeuser';

    protected $fillable = ['codeuser','name'];

    public function admin() {
    	return $this->hasOne('App\Admins', 'codeuser');
    }
    public function adminspartnership() {
    	return $this->hasOne('App\Adminspartnership', 'codeuser');
    }
    public function member() {
    	return $this->hasOne('App\Members', 'codeuser');
    }
    
}
