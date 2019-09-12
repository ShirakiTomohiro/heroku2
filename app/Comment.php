<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
use App\User;
class Comment extends Model
{
    protected $guarded = array('id');
    

    
    public function news()
    {
         return $this->belongsTo('App\News');
    }
    
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
