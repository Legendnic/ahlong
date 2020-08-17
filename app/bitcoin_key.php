<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bitcoin_key extends Model
{
    protected $fillable = [
        'public_key', 'private_key', 'wallet_address',
    ];
    public function company()
    {
        return $this->belongsTo('App\company');
    }
    public function contract()  
    {
        return $this->hasMany('App\contracts','bitcoin_key','id');
    }
}
