<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['name',];
    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function tickets(){
        return $this->hasMany('App\Ticket');
    }

}
