<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagservices extends Model
{
    protected $table = 'tagservices';
	protected $fillable = [
        'name',
    ];

    public function services() {
    	return $this->belongsTo('App\Services', 'codeservices');
    }
    public function companyservices()
    {
        return $this->belongsToMany('App\Companyservices', 'tagcompanyservices', 'codecompanyservices', 'codetagservices');
    }
}
