<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    public $fillable = ['price','type'];
    public function event(){
        return $this->belongsTo('App\Event');
    }

}
