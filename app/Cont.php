<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Setlist;
class Cont extends Model
{
    protected $guarded = array('id');
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function setlist()
    {
        return $this->belongsTo('App\Setlist');
    }
}

