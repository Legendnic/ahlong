<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class block extends Model
{
    public function contract()
    {
        return $this->hasOne('App\contract');
    }
}
