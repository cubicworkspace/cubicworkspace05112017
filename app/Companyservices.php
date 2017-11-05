<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companyservices extends Model
{
    protected $table = 'companyservices';
    protected $fillable = [
        'name',
    ];

    public function companypartnership() {
    	return $this->belongsTo('App\Companypartnership', 'codecompanypartnership');
    }
    public function services() {
    	return $this->belongsTo('App\Services', 'codeservices');
    }
    // public function tagservices() {
    //     return $this->belongsToMany('App\Tagservices', 'tagcompanyservices','codecompanyservices','codetagservices')->withTimeStamps();
    // }
    public function tagservices() {
        return $this->belongsTo('App\Tagservices', 'codetagservices');
    }

    public function city() {
        return $this->belongsTo('App\Citys', 'codecity');
    }


    public function getKategoriTagAttribute()
    {
        return $this->tagservices->lists('id')->toArray();
    }
     public function scopeServices($query, $codeservices)
    {
        return $query->where('codeservices', $codeservices);
    }

    // public function tagserv()
    // {
    //     return $this->belongsToMany('App\Tagservices', 'codetagservices');
    // }
}
