<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = array('id');
    

    
    public function news()
    {
         return $this->belongsTo('App\News');
    }
}
