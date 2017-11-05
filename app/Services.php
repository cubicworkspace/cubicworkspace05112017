<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
	protected $table = 'services';

    protected $fillable = [
        'name'
    ];
    public function categoryservices() {
    	return $this->belongsTo('App\Categoryservices', 'codecategoryservices');
    }

    public function companyservices()
    {
        return $this->hasMany('App\Companyservices', 'codeservices');
    }
}
