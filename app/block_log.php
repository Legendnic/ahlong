<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class block_log extends Model
{
    public function user()
    {
        return $this->hasOne('App\User','user_id','id');
    }
    public function contract()
    {
        return $this->hasOne('App\contract','contract_id','id');
    }
}
