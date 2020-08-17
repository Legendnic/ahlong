<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    protected $fillable=[
        'reciever','value'
    ];
    public function loaner_company()
    {
        return $this->belongsTo('App\company','loaner_company','id');
    }
    public function loanee_company()
    {
        return $this->belongsTo('App\company','loanee_company','id');
    }
    public function loaner_user()
    {
        return $this->belongsTo('App\User','loaner_user','id');
    }
    public function loanee_user()
    {
        return $this->belongsTo('App\User','loanee_user','id');
    }
    public function bitcoin_key()
    {
        return $this->belongsTo('App\bitcoin_key');
    }
    public function block_logs()    
    {
        return $this->belongsTo('App\block_log');
    }
    public function block()    
    {
        return $this->belongsTo('App\block','contract_id','id');
    }
}
