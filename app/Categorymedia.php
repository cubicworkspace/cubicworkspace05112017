<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorymedia extends Model
{
    protected $table = 'categorymedia';
    protected $primary = 'codecategorymedia';

    protected $fillable = ['codecategorymedia','name'];

    public function media() {
    	return $this->hasOne('App\Media', 'codecategorymedia');
    }
}
