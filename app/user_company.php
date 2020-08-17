<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_company extends Model
{
    protected $fillable = [
        'company_id', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function company()
    {
        return$this->belongsTo('App\company');
    }
}
