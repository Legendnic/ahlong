<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = [
        'name', 'address', 'description','field','email'
    ];

    public function user_company()
    {
        return $this->hasMany('App\user_company','company_id','id');
    }

    public function keys()
    {
        return $this->hasMany('App\bitcoin_key','company_id','id');
    }
    public function contract()
    {
        return $this->hasMany('App\contract');
    }
    
}
