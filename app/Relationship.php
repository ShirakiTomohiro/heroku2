<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Relationship','follower_id');
    }
    
    public function news()
    {
        return $this->belongsTo('App\Relationship');
    }
}
